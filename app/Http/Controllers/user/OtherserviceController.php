<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherService\StoreRequest;
use App\Models\OtherService;
use App\Models\TransactionCharges;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OtherserviceController extends Controller
{


    
    public function storeOtherservice(StoreRequest  $request){
        if ($request->storeService()) {
            return  redirect()->route('otherservice-pay');
        }
        return back()->with('error', 'Something went wrong');
    }

    public function otherPay(){
        $otherservice = OtherService::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::all();
        foreach($charge as $charges){}
        $chargesAmount =  $charges->other_service + $otherservice->amount;
        
        if ($otherservice->amount == null) {
           return back()->with('error', 'Amount must be provided');
        }elseif($otherservice){
            $otherservice->update([
                'total_amount'=>$chargesAmount,
            ]);
        }else{
            return back()->with('error', 'An error occurred');
        }
      
        return view('users.otherservice.pay', compact('otherservice', 'charges'));
    }

    public function otherservicePayment(Request $request){
        $reference = 'VS_' . uniqid();
        $authnication = getenv('SECRET_KEY');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');

        $totalamount = OtherService::where('user_id', auth()->user()->id)->latest()->first();
       

        $requestData = [];

        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $totalamount->total_amount) {
                return back()->with('error', 'Insufficient wallet balance. Please choose another payment method.');
            }else {
                $userbalance = $userWallet->amount - $totalamount->total_amount;

                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                $payment = OtherService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->payment_method = $selectedPaymentMethod;
                $payment->save();   
            }

            return redirect()->route('initiator-page')->with('success', 'Payment Successful');

        } elseif ($selectedPaymentMethod == 'debit') {

            $requestData = [
                'key3' => 'value3',
                'key4' => 'value4',
            ];
        } elseif ($selectedPaymentMethod == 'visa') {
            $requestData = [
                'amount' => $totalamount->total_amount,
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('otherservice-pay-callback'),

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
            session(['pay_merchandise' => [
                'amount' => $totalamount->total_amount,
                'payment_method'=>$selectedPaymentMethod
            ]]);
            $paymentLink = $responseData['data']['link'];
            return view('frontend.checkout')->with('paymentLink', $paymentLink); 
        } else {
            return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
        }  
    }

    public function otherservicePayCallback(Request $request){
        $status = $request->input('status');

        if ($status == 'successful') {
            $paymentData = session('pay_merchandise');
    
            if ($paymentData) {
                $payment = OtherService::where('user_id', auth()->user()->id)->latest()->first();
                $payment->paid = 1;
                $payment->payment_method = $paymentData['payment_method'];
                $payment->save();   
               
                // Clear the session data after using it
                $request->session()->forget('pay_merchandise');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('otherservice-page')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('otherservice-page')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('otherservice-page')->with('error', 'Payment failed');
        }
    }
}


