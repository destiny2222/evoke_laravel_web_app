<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Kyc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        try {
            $userid = $request->input('user_id');
            $kyc->update([
                'approve_status' => $request->has('approve_status') ? 1 : 0,
                'user_id' => $userid,
            ]);
            return redirect(route('admin.kyc.index'))->with('success', 'Approved Successfuly');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect(route('admin.kyc.index'))->with('error', 'Oops',  'Something went worry');
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
        try {
            $kyc = Kyc::findOrFail($id);
            $kyc->delete();
            return redirect(route('admin.kyc.index'))->with('success', 'Successfuly Deleted');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            return redirect(route('admin.kyc.index'))->with('error', 'Oops',  'Something went worry');
        }
    }
}
