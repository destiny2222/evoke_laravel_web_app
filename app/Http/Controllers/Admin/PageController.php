<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\UpdateRequest;
use App\Mail\Email;
use App\Models\EmailMail;
use App\Models\Post;
use App\Models\Services;
use App\Models\Setting;
use App\Models\TransactionCharges;
use App\Models\TuitionPayment;
use App\Models\TuitionPaymentWire;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

use function PHPSTORM_META\map;

class PageController extends Controller
{
    
    public function detailPost(Post $post)
    {
       return view('admin.Post.show',[
            'post'=>$post,
       ]);
    }

    //  send mail to users

    public function emailPage(){
        $sendmail  = EmailMail::orderBy('id', 'desc')->get();
        // dd($sendmail);
        return view('admin.emails.index',['sendmail'=>$sendmail]);
    }


    public function sendMail(){
        return view('admin.emails.create');
    }


    public function storeMail(Request $request){
        $request->validate([
            'name'=>['required', 'string'],
            'email'=>['required', 'string', 'email'],
            'message'=>['required', 'string'],
        ]);


       try {
            $Mail = EmailMail::create($request->all());
            Mail::to($Mail->email)->send(new Email($Mail));
        Alert::success('Email sent successfully');
        return redirect()->route('admin.send-mail-page');
       } catch (\Exception $exception) {
          Log::error($exception->getMessage());
          Alert::error('error', 'Email not sent successfully');
          return back();
       }
    }

    public function mailDelete($id){
        
        try {
            $Mail = EmailMail::find($id);
            $Mail->delete();
            Alert::success('success', 'Deleted successfully');
            return back();
        } catch (\Exception $exception) {
            Log::info($exception->getMessage());
            Alert::error('error', 'Failed to delete');
            return back();
        }
    }

    // search engine
    public function searchEngine(Request $request){
        $user = User::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }]
        ])->paginate(6);

        return view('admin.useradmin.user', compact('user'));
    }


    // Tuition payment
    public function tuitionView(){
        $tuition = TuitionPayment::orderBy('id', 'desc')->paginate(10);
        return view('admin.tuition.index', [
            'tuition' => $tuition,
        ]);
    }


    public function tuitionDeView($id){
            $tuition =  TuitionPayment::findOrFail($id);
            if ($tuition) {
                $tuition->delete();
                Alert::success('success', 'Deleted successfully');
                return back();
            } else {
                Alert::error('error', 'Failed to delete');
                return back();
            }
    }


    public function tuitionWireView(){
        $tuition = TuitionPaymentWire::orderBy('id', 'desc')->paginate(10);
        return view('admin.tuition.wiretransfer', [
            'tuition' => $tuition,
        ]);
    }


    public function tuitionDeleteWireView($id){
            $tuition =  TuitionPaymentWire::findOrFail($id);
            if ($tuition) {
                $tuition->delete();
                Alert::success('success', 'Deleted successfully');
                return back();
            } else {
                Alert::error('error', 'Failed to delete');
                return back();
            }
    }




    public function TransactionCharges(){
        $charge = TransactionCharges::orderBy('id', 'desc')->get();
        return view('admin.Charges.index',[
            'charge' => $charge,
        ]);
    }

    public function TransactionchargesCreate(){
        return view('admin.Charges.create');
    }


    public function TransactionchargesStore(Request $request){
          $request->validate([
             'flights_charge_amount'=>['required','string'],
             'tuition_charge_amount'=>['required','string'],
             'visa_charge_amount'=>['required','string'],
             'corporate_charge_amount'=>['required','string'],
             'merchant_charge_amount'=>['required','string'],
          ]);


          try {
            TransactionCharges::create($request->all());
            Alert::success('Transaction charges have been created successfully');
            return redirect()->route('admin.transaction-charge-page');
          } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Alert::error('Something went wrong');
            return back();
          }
          
    }


    public function TransactionChargesEdit($id){
        try {
            $charge = TransactionCharges::find($id);
            return view('admin.Charges.edit',['charge' => $charge]);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Alert::error('Something went wrong');
            return back();
        }
    }


    public function TransactionChargesUpdate(Request $request, $id){
            $charge = TransactionCharges::find($id);
            $charge->update([
                'flights_charge_amount'=>$request->flights_charge_amount,
                'tuition_charge_amount'=>$request->tuition_charge_amount,
                'visa_charge_amount'=>$request->visa_charge_amount,
                'corporate_charge_amount'=>$request->corporate_charge_amount,
                'merchant_charge_amount'=>$request->merchant_charge_amount,
            ]);
            Alert::info('Updated Successfully');
            return redirect()->route('admin.transaction-charge-page');
    }


    public function TransactionChargesDelete($id){
        $charge = TransactionCharges::find($id);
        $charge->delete();
        Alert::success('Charge', 'Deleted Successfully');
        return redirect()->route('admin.transaction-charge-page');
    }


    // Enable logging
    public function enableLogging(){
        $setting = Setting::first();
        return view('admin.feature.index', compact('setting'));
    }

    
    public function updateService(UpdateRequest $request){
        if(Setting::count()){
            Setting::first()->update($request->validated());
        }else{
            Setting::create($request->validated());
        }
        Alert::success('Updated Sucessfully');
        return back();
    }


}
