<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\FLightBooking;
use App\Models\FLightCustomerDetails;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\InvoicePaid;
use App\Notifications\TransctionNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class FlightController extends Controller
{
    public function flightsPayment(){
        return view('users.Flight.flightpayment');
    }


    public function  flightBooking(Request $request){
        try {
         $request->validate([
             'airport_location_from' =>['nullable','string'],
             'airport_location_to' =>['nullable','string'],
             'flight_date' =>['nullable', 'date'],
             'flight_return_date' =>['nullable', 'date'],
             'flight_class' =>['nullable', 'string'],
             'flight_time' =>['nullable', 'time'],
             'flight_passenger_number' =>['nullable', 'string'],
             'passenger_name' =>['nullable', 'string'],
         ]);
 
 
         $flightBooking = FLightBooking::create([
             'airport_location_from' => $request->airport_location_from,
             'airport_location_to' => $request->airport_location_to,
             'flight_date' => $request->flight_date,
             'flight_return_date' => $request->flight_return_date,
             'flight_class' => $request->flight_class,
             'flight_time' => $request->flight_time,
             'flight_passenger_number' => $request->flight_passenger_number,
             'passenger_name' => $request->passenger_name,
             'user_id'=>auth()->user()->id,
         ]);
         
         $customerDetails = FLightCustomerDetails::create([
             'flightbooking_id'=>$flightBooking->id,
             'first_name'=>$request->first_name,
             'middle_name'=>$request->middle_name,
             'last_name'=>$request->last_name,
             'email'=>$request->email,
             'phone'=>$request->phone,
             'address'=>$request->address,
             'city'=>$request->city,
             'state'=>$request->state,
             'zip'=>$request->zip,
             'country'=>$request->country,
             'user_id'=>auth()->user()->id,
         ]);
 
         $flightBooking->flightcustomerDetails()->save($customerDetails);
         // Alert::success('Success', 'Flight Booking Successfully');
         return redirect(route('flightpayment-page'))->with('success', 'Flight Booking Successfully!! Proceed to payment');
        } catch (\Exception $exception) {
           Log::error($exception->getMessage());
           return back()->with('error', 'Oops Something went worry');
        } 
     }



    public function flightsPaymentAction(Request $request){

        $request->validate([
            'firstname' =>'required',
            'lastname' =>'required',
            'email' =>'required',
            'amount' =>'required',
            'bookinglink' =>'required',
            'other_information' =>'nullable',
        ]);
        try{
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
                'currency' => "USD",
                'redirect_url' => route('callback'),

                'customer' => [
                    'email' => $request->email,
                    "phone_number" => $request->phone,
                    "name" => $request->name
                ],

                "customizations" => [
                    "title" => 'Movie Ticket',
                    "description" => "20th October"
                ]
        ]);
        $responseData = $response->json();

            if (isset($responseData['status']) && $responseData['status'] === 'success') {
                session(['flightpayment_data' => [
                    'user_id' => $request->input('user_id'),
                    'firstname' => $request->input('firstname'),
                    'lastname' => $request->input('lastname'),
                    'email' => $request->input('email'),
                    'reference_id' => $reference,
                    'bookinglink' => $request->input('bookinglink'),
                    'other_information' => $request->input('other_information'),
                    'amount' => $request->input('amount'),
                ]]);
                $paymentLink = $responseData['data']['link'];
                return view('frontend.checkout')->with('paymentLink', $paymentLink); 
            } else {
                return back()->with('error', 'Oops something went wrong. Please refresh the page and try again');
            }
         }catch(\Exception $exception) {
            Log::error($exception->getMessage());
            return Redirect::back()->with(['Page Expired' => 'The token has expired. Please refresh the page and try again.',
            'type' => 'error']);
         }
    }


    public function handlecallback(Request $request)
    {
        $status = $request->input('status');

        if ($status == 'successful') {
            $paymentData = session('flightpayment_data');

            if ($paymentData) {
                $user_id = $paymentData['user_id'];
                $firstname = $paymentData['firstname'];
                $lastname = $paymentData['lastname'];
                $email = $paymentData['email'];
                $other_information = $paymentData['other_information'];
                $reference_id = $paymentData['reference_id'];
                $bookinglink = $paymentData['bookinglink'];
                $amount = $paymentData['amount'];

                $pay = Payment::create([
                    'user_id' => $user_id,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'amount' => $amount,
                    'other_information' => $other_information,
                    'reference_id' => $reference_id,
                    'bookinglink' => $bookinglink,
                    'payment_status'=>true
                ]);
                $pay->save();
                $request->session()->forget('flightpayment_data');
                $adminmail = 'admin@gmail.com';   
                $user = User::where('email', auth()->user()->id);
                Notification::sendNow($user, $adminmail  , new InvoicePaid($pay));
                return back()->with('success', 'Payment payed successful');
            } else {
                return redirect()->route('flightpayment')->with('error', 'Payment data not found');
            }
        } elseif ($status == 'cancelled') {
            return redirect()->route('flightpayment')->with('error', 'Payment cancelled');
        } else {
            return redirect()->route('flightpayment')->with('error', 'Payment failed');
        }
    }



}
