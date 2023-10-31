<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\CorporateService;
use App\Models\InternationalFlight;
use App\Models\LocalFlight;
use App\Models\Merchandise;
use App\Models\OtherService;
use App\Models\TuitionPayment;
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
        $counttuition = TuitionPayment::where('user_id', auth()->user()->id)->get();
        $countcorporate = CorporateService::where('user_id', auth()->user()->id)->get();
        $countOtherservice = OtherService::where('user_id', auth()->user()->id)->get();
        $countmerchandise = Merchandise::where('user_id', auth()->user()->id)->get();
        $countvisa = VisaApplication::where('user_id', auth()->user()->id)->get();
        $countfightlocal = LocalFlight::where('user_id', auth()->user()->id)->count();
        $countfight = InternationalFlight::where('user_id', auth()->user()->id)->count();
        // dd($countfight);
        return view('users.index',[
            'balance'=>$walletbalance->sum('amount'),
            'counttuition'=>$counttuition->sum('amount'),
            'countcorporate'=>$countcorporate->sum('amount'),
            'countOtherservice'=>$countOtherservice->sum('amount'),
            'countmerchandise'=>$countmerchandise->sum('amount'),
            'countvisa'=>$countvisa->sum('visa_fee_amount'),
            'countfightlocal'=>$countfightlocal,
            'countfight'=>$countfight,
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


