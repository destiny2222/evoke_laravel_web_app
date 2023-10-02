<?php

namespace App\Http\Controllers\user;


use App\Http\Controllers\Controller;
use App\Models\UserWallet;
use App\Models\VisaApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Unicodeveloper\Paystack\Facades\Paystack;

class VisaApplicationController extends Controller
{
    //

    public function usPay(){
        // $visaApplication = VisaApplication::where('user_id', auth()->user()->id)->latest()->first();
        return view('users.Visa.us_visa_payment');
    }

    public function storeApplication(Request $request)
    {
       try {
            // Validate the form data
            $request->validate([
                'name' => 'required|string|max:255',
                'case_number' => 'required|string|max:255',
                'invoice_id' => 'required|string|max:255',
                'visa_fee_amount' => 'required|numeric',
            ]);

            // Calculate service fee and total charge
            $serviceFee = 9; 
            $totalCharge = $request->visa_fee_amount + $serviceFee;

            // Save the visa application data to the database
           $visaApplication = VisaApplication::create([
                'name' => $request->name,
                'case_number' => $request->case_number,
                'invoice_id' => $request->invoice_id,
                'visa_fee_amount' => $request->visa_fee_amount,
                'service_fee' => $serviceFee,
                'total_charge' => $totalCharge,
                'user_id' => $request->user_id,
            ]);
            
            $recentVisaApplication = VisaApplication::find($visaApplication->id);
            return view('users.Visa.us_visa_payment')->with('visaApplication', $recentVisaApplication);
       } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Oops something went worry. Please refresh the page and try again');
       }
    }

    public function initiatePayment(Request $request)
    {
        
    }


    public function handleWebhook(Request $request)
    {
        
    }
}
