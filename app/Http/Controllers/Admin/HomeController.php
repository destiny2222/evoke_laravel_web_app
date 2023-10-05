<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\LocalFlight;
use App\Models\User;
use App\Models\VisaApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;


class HomeController extends Controller
{
    //
    public function __construct() {
        $this->middleware('admin');
    }


    public function home(){
        $admin = Admin::where('id', 1)->first();
        $user_count = User::count();
        $localflight = LocalFlight::count();
        $visafee = VisaApplication::count();

        $previousMonthUserCount = User::whereYear('created_at', Carbon::now()->subMonth()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->count();

        $percentageIncrease = 0; 
        if ($previousMonthUserCount > 0) {
            $percentageIncrease = (($user_count - $previousMonthUserCount) / $previousMonthUserCount) * 100;
        }

        $previousMonthLocalFlightCount = LocalFlight::whereYear('created_at', Carbon::now()->subMonth()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();

        $FlightIncrease = 0; 
        if ($previousMonthLocalFlightCount > 0) {
            $FlightIncrease = (($localflight - $previousMonthLocalFlightCount) / $previousMonthLocalFlightCount) * 100;
        }


        $previousMonthvisafeeCount = LocalFlight::whereYear('created_at', Carbon::now()->subMonth()->year)
        ->whereMonth('created_at', Carbon::now()->subMonth()->month)
        ->count();

        $visafeeIncrease = 0; 
        if ($previousMonthvisafeeCount > 0) {
            $visafeeIncrease = (($visafee - $previousMonthvisafeeCount) / $previousMonthvisafeeCount) * 100;
        }

        return view('admin.index', [
            'admin' => $admin,
            'user_count' => $user_count,
            'localflight' => $localflight,
            'visafee' => $visafee,
            'FlightIncrease' => $FlightIncrease,
            'visafeeIncrease' => $visafeeIncrease,
            'percentageIncrease' => $percentageIncrease,
        ]);
    }

    public function profile()
    {
        $admin = Admin::where('id', 1)->first();
        // dd($admin);
        return view('admin.profile', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        try {
            // $admin = Admin::where('id', $id)->first();
            $admin = Admin::findOrFail($id);
            $admin->update([
                // 'image'=>$image_file ?? $users->image,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            // dd($admin);
            return response()->json(['Success'=> 'Updated Successfull'], 200);
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return response()->json(['Error'=> 'Something went Wrong'], 400);
        }
    }

    public function validatepassword(Request  $request)
    {
        $this->validate($request, [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string'],
        ]);
        # check for current password match
        $adminpassword = Admin::where('id', 1)->first();
        if (password_verify($request->current_password, $adminpassword->password)) {
            # if true
            if ($request->new_password == $request->Confirm_password) {
                # send otp to user email and the password in datebase
                session(['new_password' => $request->new_password]);
                $adminpassword->update([
                    'password' => Hash::make(session('new_password'))
                ]);
                // dd($adminpassword);
                return response()->json(['success'=>'Password Change Successful'], 200);
                //  redirect(route('admin.profile-page'));
            } else {
                return response()->json(['error' => 'Error! Password Mismatch', 400]);
            }
        } else {
            return response()->json(['error'=> 'Error! The password does not match the current password?'], 500);
        }
    }
}


