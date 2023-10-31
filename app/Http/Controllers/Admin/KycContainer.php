<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Kyc;
use App\Models\User;
use App\Notifications\KycNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class KycContainer extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::where('id', 1)->first();
        $kyc = Kyc::orderBy('id', 'desc')->get();
        return view('admin.kycs.index', [
            'kyc'=>$kyc,
            'admin'=>$admin,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $kyc = Kyc::findOrFail($id);
            return view('admin.kycs.edit',  [
                'kyc'=>$kyc,
            ]);
            return back()->with('success', 'Approved Successfuly');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return back()->with('error', 'Oops Something went worry');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kyc = Kyc::findOrFail($id);
        $useremail = $kyc->user->email;
        $user = User::where('email', $useremail)->first();
        if($kyc){
            $userid = $request->input('user_id');
            $kyc->update([
                'gender'=>$request->input('gender'),
                'marital_status'=>$request->input('marital_status'),
                'date_birth'=>$request->input('date_birth'),
                'nationality'=>$request->input('nationality'),
                'street_address'=>$request->input('street_address'),
                'street_address_2'=>$request->input('street_address_2'),
                'proof_of_address'=>update_image('kyc/proof/', $kyc->proof_of_address, 'image'),
                'documents'=>update_image('kyc/', $kyc->documents, 'image'),
                'data_sign'=>$request->input('data_sign'),
                'approve_status' => $request->has('approve_status') ? 1 : 0,
                'user_id' => $userid,
            ]);

            Alert::success('success', 'Approved Successfuly');
            if ($kyc->approve_status == 1){
                $user->notify(new KycNotification($kyc));
            }
            return redirect(route('admin.kyc.index'));
        } else{
            Alert::success('error', 'Oops Something went worry');
            return redirect(route('admin.kyc.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kyc = Kyc::findOrFail($id);
        if($kyc) {
            $kyc->delete();
            Alert::success('success', 'Successfuly Deleted');
            return redirect(route('admin.kyc.index'));
        } else {
            Alert::error('error', 'Oops',  'Something went worry');
            return redirect(route('admin.kyc.index'));
        }
    }
}
