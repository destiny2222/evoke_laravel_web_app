<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class ManagementController extends Controller
{
    public function UserManagement(){
        $user = User::orderBy('id', 'desc')->paginate(6);
        return view('admin.useradmin.user',[
            'user'=>$user,
        ]);
    }

    public function editUser($id){
        $user = User::find($id);
        $useramount = 0;
        if (!$user->userwallet == null ) {
            $useramount += $user->userwallet->amount;
        }else {
            $useramount;
        }
        return view('admin.useradmin.user-edit',[
            'user'=>$user,
            'useramount'=>$useramount,
        ]);
    }


    public function updateUser(Request $request, $id){
        try {
            $user = User::find($id);
    
            if(!$user) {
                Alert::info('error', 'User record not found');
                return redirect()->back();
            }
    
            if($request->hasFile('image')) {
                $image_file = time().'.'.$request->image->extension();
                $request->image->move(public_path('/'),$image_file);
            } else {
                $image_file = $user->image; 
            }
    
            // Update user data
            $user->update([
                'image' => $image_file,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'state' => $request->state,
                'city' => $request->city,
                'country' => $request->country,
                'address' => $request->address,
                'referrence_id' => $request->referrence_id,
            ]);
    
            // Update userwallet amount if it exists
            if ($user->userwallet) {
                $user->userwallet->update([
                    'amount' => $request->input('userwallet_amount'), 
                ]);
            }else{
               UserWallet::create([
                  'user_id'=>$user->id,
                  'name'=>$user->name,
                  'amount' => $request->input('userwallet_amount'),
               ]);
            }
            Alert::info('success', 'Edited Successfully') ;
            return redirect()->route('admin.user-page');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Alert::error('error', 'Something went wrong');
            return back();
        }
    }
    



    public function deleteUser($id){
        try {
            $user = User::findOrFail($id);
            $user->delete();
            Alert::success('success', 'Successfuly Delete');
            return back();
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            Alert::error('error', 'Oops Something went worry!');
            return back();
        }
    }
}