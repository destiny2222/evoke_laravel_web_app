<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Http\Requests\VisaFee\VisaApplcationRequest;
use App\Models\TransactionCharges;
use App\Models\UserWallet;
use App\Models\VisaApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Unicodeveloper\Paystack\Facades\Paystack;

class VisaApplicationController extends Controller
{
    //

    public function usPay(){
        $visaApplication = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::all();
        $charges =  $charge->sum('visa_charge_amount') + $visaApplication->visa_fee_amount;
        if ($visaApplication) {
            $visaApplication->update([
                'total_charge'=>$charges,
            ]);
        }
        return view('users.Visa.us_visa_payment',compact('visaApplication','charge'));
    }

    public function storeApplication(VisaApplcationRequest $request)
    {
        if ($request->createApplication()) {
            return redirect()->route('pay-page');   
        }else{
            return back()->with('error', 'Oops something went worry. Please refresh the page and try again');
        }
    }

    public function initiatePayment(Request $request)
    {
        $reference = 'VS_' . uniqid();
        $authnication = getenv('SECRET_KEY');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('payment_option');
        $totalamount = $request->input('total');
        $requestData = [];
        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $totalamount) {
                return back()->withError('Insufficient wallet balance. Please choose another payment method.');
            } else {
                $userbalance = $userWallet->amount - $totalamount;

                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                $payment = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save();   
            }

            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        } elseif ($selectedPaymentMethod == 'debit') {

            $requestData = [
                'key3' => 'value3',
                'key4' => 'value4',
            ];
        } elseif ($selectedPaymentMethod == 'payment') {
            $requestData = [
                'amount' => $totalamount,
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('paystack.webhook'),

                'customer' => [
                    'email' => auth()->user()->email,
                    "phone_number" => auth()->user()->phone,
                    "name" => auth()->user()->name
                ],

                "customizations" => [
                    "title" => 'EvokeEdge  Limited',
                    "description" => "20th October"
                ]
            ];
        } else {
            return back()->with(['error' => 'Invalid payment option']);
        }
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authnication,
            'Content-Type' => 'application/json'
        ])->post('https://api.flutterwave.com/v3/payments', $requestData);

        $responseData = $response->json();
        if (isset($responseData['status']) && $responseData['status'] === 'success') {
            session(['visa_application' => [
                'amount' => $totalamount,
            ]]);
            $paymentLink = $responseData['data']['link'];
            return view('frontend.checkout')->with('paymentLink', $paymentLink); 
        } else {
            return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
        }   
    }


    public function handleWebhook(Request $request)
    {
        $status = $request->input('status');
    
        if ($status == 'successful') {
            $paymentData = session('visa_application');
    
            if ($paymentData) {
                $payment = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->save();   
               
                // Clear the session data after using it
                $request->session()->forget('visa_application');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('pay-page')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('pay-page')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('pay-page')->with('error', 'Payment failed');
        }
    }
}
