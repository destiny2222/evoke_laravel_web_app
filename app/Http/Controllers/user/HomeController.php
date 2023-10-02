<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VisaApplication;
use Illuminate\Http\Request;
use App\Models\UserWallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = Auth::user();
        $walletbalance = UserWallet::where('user_id', $user->id)->where('status', '1')->get();
        return view('users.index',[
            'balance'=>$walletbalance->sum('amount'),
        ]);
    }


    public function KYC(){
        return view('users.settings.kyc');
    }

    public  function Setting(){
        $user = Auth::user();
        return view('users.settings.setting', [
            'user'=>$user,
        ]);
    }
    public  function Profile(){
        $user = Auth::user();
        return view('users.settings.profile', [
            'user'=>$user,
        ]);
    }


   
}


