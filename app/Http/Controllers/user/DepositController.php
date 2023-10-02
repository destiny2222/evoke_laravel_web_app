<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserWallet\UpdateWallet;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use Unicodeveloper\Paystack\Facades\Paystack;

class DepositController extends Controller
{
    public function depositPayment(Request $request)
    {

        $request->validate([
            'name'=>['required', 'string'],
            'amount'=>['required', 'string'],
            'user_id'=>['required', 'string'],
        ]);

            $reference = 'VS_' . uniqid();
            $authnication = getenv('SECRET_KEY');
            $response = Http::withHeaders([
                'Authorization' => 'Bearer '  .$authnication,
                'Content-Type' => 'application/json'
            ])->post('https://api.flutterwave.com/v3/payments', [
                'amount' => $request->amount,
                'email' => $request->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('callback'),

                'customer' => [
                    'email' => $request->email,
                    "phone_number" => $request->phone,
                    "name" => $request->name
                ],

                "customizations" => [
                    "title" => 'EvokeEdge  Limited',
                    "description" => "20th October"
                ]
            ]);

            $responseData = $response->json();

            if (isset($responseData['status']) && $responseData['status'] === 'success') {
                session(['payment_data' => [
                    'user_id' => $request->input('user_id'),
                    'name' => $request->input('name'),
                    'amount' => $request->input('amount'),
                ]]);
                $paymentLink = $responseData['data']['link'];
                return view('frontend.checkout')->with('paymentLink', $paymentLink); 
            } else {
                return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
            }
    }


    public function handlecallback(Request $request)
{
    $status = $request->input('status');

    if ($status == 'successful') {
        $paymentData = session('payment_data');

        if ($paymentData) {
            $user_id = $paymentData['user_id'];
            $name = $paymentData['name'];
            $amount = $paymentData['amount'];

            $wallet = UserWallet::first();

            if ($wallet) {
                $newAmount = $wallet->amount + $amount;
                $wallet->update([
                    'user_id' => $user_id,
                    'name' => $name,
                    'amount' => $newAmount,
                    'status' => 1,
                ]);
            } else {
                UserWallet::create([
                    'user_id' => $user_id,
                    'name' => $name,
                    'amount' => $amount,
                    'status' => '1'
                ]);
            }
            // Clear the session data after using it
            $request->session()->forget('payment_data');
            return redirect()->route('deposit-page')->with('success', 'Payment payed successful');
        } else {
            return redirect()->route('deposit-page')->with('error', 'Payment data not found');
        }
    } elseif ($status == 'cancelled') {
        return redirect()->route('deposit-page')->with('error', 'Payment cancelled');
    } else {
        return redirect()->route('deposit-page')->with('error', 'Payment failed');
    }
 }

}
