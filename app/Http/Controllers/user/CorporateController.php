<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\Corporate\StoreRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CorporateController extends Controller
{
    public function store(StoreRequest $request){
        if ($request->createService()) {
            Alert::success('Sent    Successfully');
            return redirect()->route('corporate-service-page');
        } else {
            Alert::error('Failed');
            return redirect()->back();
        }
    }
}
