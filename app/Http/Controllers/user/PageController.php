<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\KycRequest;
use App\Http\Requests\Tuition\WireTransfer;
use App\Models\Kyc;
use App\Models\Setting;
use App\Models\TransactionCharges;
use App\Models\TuitionPayment;
use App\Models\TuitionPaymentWire;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    //

    public function Manage(){
        return view('users.settings.manage');
    }
    public function Initiator(){
        $setting = Setting::first();
        return view('users.initiator', compact('setting'));
    }
    public function pay_school_fee(){
       
        return view('users.TuitionPayment.payschool');
    }

    public function helps(){
        return view('users.settings.helps');
    }


    public  function Corporate(){
        return view('users.Corporate.corporate');
    }


    public function Merchandise() {
        return view('users.merchandise.merchandise');
    }

    public function OthersPayment() {
        $charges = TransactionCharges::where('other_service', 'id')->first();
        return view('users.otherservice.OthersPayment', compact('charges'));
    }

   public function Vise(){
      return  view('users.Visa.vise_fee');
   }

 

   public function CanadaVisa(){
        return view('users.Visa.canada_visa');
   }

   public function UsVisa(){
      return view('users.Visa.us_visa');
   }

   public function Megamill(){
      
      return view('users.Corporate.mega_millions');
   }

   public function Powerball(){
      
      return view('users.Corporate.power_ball');
   }


   public function deposit()
   {
       
       return view('users.Corporate.deposit');
   }

   public function  flight(){
     return view('users.Flight.flight');
   }
   

   public function redirect(Request $request)
    {
        $redirectPage = $request->input('redirect_page');
        // Check if a valid page is selected
        if (!empty($redirectPage)) {
            // Decode the URL before redirection
            $decodedRedirectPage = urldecode($redirectPage);
            return redirect()->to($decodedRedirectPage);
        }
        return redirect()->route('visa-page')->with('error', 'Please select a valid page.');
    }

    public  function storeKyc(KycRequest $request){
        try {
            if ($request->createKyc()) {
                return redirect(route('login'))->with('info', 'Sent successfully! Undergoing verification');
            }
            return back()->with('error', 'Oops Something went Worry, try again');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Oops Something went Worry, try again');
        }
        
    }

    public function payschoolPortal(){
        $portal = session('schoolportal');
        if (isset($portal['college_name']) && $portal['service_type']) {
            $collegeName = $portal['college_name'];
            $serviceType = $portal['service_type'];
        } else {
            $collegeName = null; 
            $serviceType = null; 
        }
        return view('users.TuitionPayment.portal',[
            'portal'=>$portal,
            'collegeName'=>$collegeName,
            'serviceType'=>$serviceType,
        ]);
    }

    public function tuitionpaymentView(){
        $pay = TuitionPayment::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::all();
        $userbalance = UserWallet::where('user_id', auth()->user()->id)->get();
        // calculate pay and charge  by adding both amount together
        $totalPay = $pay->amount + $charge->sum('tuition_charge_amount');
        session(['totals' => [
            'amount' => $totalPay
        ]]);
  
        foreach ($charge as $key => $charges) {
            // dd($charges->tuition_charge_amount);
        }
       
        return view('users.TuitionPayment.paymenttution', [
            'pay' => $pay,
            'charges' => $charges,
            'totalPay'=>$totalPay,
            'userbalance' => $userbalance->sum('amount'),
        ]);
    }



    public function getPayment(Request $request){

        $reference = 'VS_' . uniqid();
        $authnication = getenv('SECRET_KEY');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');
        $totalamount = session('totals');
        
        $requestData = [];
        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();

            if ($userWallet->amount < $totalamount['amount']) {
                return back()->withError('Insufficient wallet balance. Please choose another payment method.');
            } else {
                $userbalance = $userWallet->amount - $totalamount['amount'];
                $userWallet->update([
                    'amount' => $userbalance,
                ]);
            
                $pay = TuitionPayment::where('user_id', auth()->user()->id)->latest()->first();
                $pay->amount = $totalamount['amount'];
                $pay->paid = 1;
                $pay->save();    
            }
            
            return redirect()->route('initiator-page')->with('success', 'Payed Successfully');


        } elseif ($selectedPaymentMethod == 'debit') {

            $requestData = [
                'key3' => 'value3',
                'key4' => 'value4',
            ];
        } elseif ($selectedPaymentMethod == 'visa') {
            $requestData = [
                'amount' => $totalamount['amount'],
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('tuition-callback'),

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
            session(['payment_visa' => [
                'amount' => $totalamount['amount'],
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
            $paymentData = session('payment_visa');
    
            if ($paymentData) {
                $pay = TuitionPayment::where('user_id', auth()->user()->id)->latest()->first();
                $pay->amount = $paymentData['amount'];
                $pay->paid = 1;
                $pay->save();   
               
                // Clear the session data after using it
                $request->session()->forget('payment_visa');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('portal-payment')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('portal-payment')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('portal-payment')->with('error', 'Payment failed');
        }
     }

    public function payschoolPortalStore(Request $request){
        $request->validate([
            'college_name'=>['required', 'string'],
            'service_type'=>['required', 'string'],
        ]);  
        session(['schoolportal'=>[
            'college_name' => $request->input('college_name'),
            'service_type' => $request->input('service_type')
        ]]);
        return  redirect()->route('school-portal');
    }

    public function paymentTuiton(Request $request){
        $request->validate([
            'college_name'=>['required','string'],
            'service_type'=>['required','string'],
            'legal_name'=>['required','string'],
            'student_email'=>['required','email','string'],
            'portal_link'=>['required','url'],
            'student_id'=>['required','string'],
            'portal_password'=>['required','string'],
            'amount'=>['required','string'],
        ]);
        TuitionPayment::create([
                'college_name'=>$request->input('college_name'),
                'service_type'=>$request->input('service_type'),
                'legal_name'=>$request->input('legal_name'),
                'student_email'=>$request->input('student_email'),
                'portal_link'=>$request->input('portal_link'),
                'student_id'=>$request->input('student_id'),
                'amount'=>$request->input('amount'),
                'portal_password'=>$request->input('portal_password'),
                'user_id'=>$request->input('user_id'),
                'paid'=>false
        ]);
        return redirect()->route('portal-payment');
    }


    public function wireTransfer(){
        $tuitionwire = session('schoolwire');
        if (isset($tuitionwire['college_name']) && $tuitionwire['service_type']) {
            $collegeName = $tuitionwire['college_name'];
            $serviceType = $tuitionwire['service_type'];
        } else {
            $collegeName = null; 
            $serviceType = null; 
        }
        return view('users.TuitionPayment.wireTransfer',[
            'tuitionwire'=>$tuitionwire,
            'collegeName'=>$collegeName,
            'serviceType'=>$serviceType,
        ]);
    }


    public function tuitionviaTransferStoreSession(Request $request){
        $request->validate([
            'college_name'=>['required', 'string'],
            'service_type'=>['required', 'string'],
        ]);  
        session(['schoolwire'=>[
            'college_name' => $request->input('college_name'),
            'service_type' => $request->input('service_type'),
        ]]);
        return  redirect()->route('wire-transfer');
    }



    public function tuitionviaTransferStore(WireTransfer $request){
        if ($request->createStore()) {
            return redirect()->route('wire-transfer-paymentView');
        }
        return back()->with('error', 'Oops something went worry. Please refresh the page and try again');
    }


    public function tuitionPaymentWireView(){
        $wirefransfer = TuitionPaymentWire::where('user_id', auth()->user()->id)->latest()->first();
        $charge = TransactionCharges::all();
        $userbalance = UserWallet::where('user_id', auth()->user()->id)->get()->sum('amount');
        // dd($userbalance);
        // calculate pay and charge  by adding both amount together
        $totalPay = $wirefransfer->amount + $charge->sum('tuition_charge_amount');
        session(['total' => [
            'amount' => $totalPay
        ]]);
  
        foreach ($charge as $key => $charges) {
            // dd($charges->tuition_charge_amount);
        }
        return view('users.TuitionPayment.paymentwire', compact('charges','totalPay', 'userbalance','wirefransfer'));
    }


    public function getPaymentWire(Request $request){

        $reference = 'VS_' . uniqid();
        $authnication = getenv('SECRET_KEY');
        
        // Get the selected payment method from the form submission
        $selectedPaymentMethod = $request->input('paymentMethod');
        $totalamount = session('total');
        
        $requestData = [];
        if ($selectedPaymentMethod == 'balance') {
            $userWallet = UserWallet::where('user_id', auth()->user()->id)->first();
            if ($userWallet->amount < $totalamount['amount']) {
                return back()->withError('Insufficient wallet balance. Please choose another payment method.');
            } else {
                $userbalance = $userWallet->amount - $totalamount['amount'];

                $userWallet->update([
                    'amount' => $userbalance,
                ]);

                $payment = TuitionPaymentWire::where('user_id', auth()->user()->id)->latest()->first();
                $payment->amount = $totalamount['amount'];
                $payment->paid = 1;
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
                'amount' => $totalamount['amount'],
                'email' => auth()->user()->email,
                'payment_options'=> "card, bank, ussd,bank transfer",
                'tx_ref' => $reference,
                'currency' => "NGN",
                'redirect_url' => route('tuition-wiretransfer-callback'),

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
            return back()->with('error', 'Invalid payment option');
        }
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $authnication,
            'Content-Type' => 'application/json'
        ])->post('https://api.flutterwave.com/v3/payments', $requestData);

        $responseData = $response->json();
        if (isset($responseData['status']) && $responseData['status'] === 'success') {
            session(['payment_visa' => [
                'amount' => $totalamount['amount'],
            ]]);
            $paymentLink = $responseData['data']['link'];
            return view('frontend.checkout')->with('paymentLink', $paymentLink); 
        } else {
            return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
        }
    }
    

    public function paymentCallback(Request $request)
    {
        $status = $request->input('status');
    
        if ($status == 'successful') {
            $paymentData = session('payment_visa');
    
            if ($paymentData) {
                $payment = TuitionPaymentWire::where('user_id', auth()->user()->id)->latest()->first();
                $payment->amount = $paymentData['amount'];
                $payment->paid = 1;
                $payment->save();   
               
                // Clear the session data after using it
                $request->session()->forget('payment_visa');
                return redirect()->route('initiator-page')->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('wire-transfer-paymentView')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('wire-transfer-paymentView')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('wire-transfer-paymentView')->with('error', 'Payment failed');
        }
     }




     
}
