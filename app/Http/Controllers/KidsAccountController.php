<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class KidsAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'nic' => ['required', 'string', 'max:255', 'unique:users'],
        ]);
        $user = new User();
        $user->nic = $request->input('nic');
        $user->full_name = $request->input('full_name');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->country = auth()->user()->country;
        $user->city = auth()->user()->city;
        $user->address = auth()->user()->address;
        $user->password = auth()->user()->password;
        $user->verification_code = auth()->user()->verification_code;
        $user->otp_code = "";
        $user->account_of = auth()->user()->id;
        $user->account_type = 'user';
        $user->is_verified = 1;
        $user->account_status = 0;
        $user->account_privacy = 0;
        $user->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Account has been created'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
