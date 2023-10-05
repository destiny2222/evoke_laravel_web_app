<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\OtherService\StoreRequest;
use App\Models\OtherService;
use Illuminate\Http\Request;

class OtherserviceController extends Controller
{


    
    public function storeOtherservice(StoreRequest  $request){
        if ($request->storeService()) {
            return  redirect()->route('otherservice-pay');
        }
        return back()->with('error', 'Something went wrong');
    }

    public function otherPay(){
        $otherservice = OtherService::where('total_amount', auth()->user()->id)->latest()->first();
        return view('users.otherservice.pay', compact('otherservice'));
    }

    public function otherservicePayment(Request $request){

    }
}
