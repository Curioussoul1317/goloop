<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAccountSettingController extends Controller
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
        return view("account_setting");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password_confirmation' => 'required',
            'password' => 'confirmed|min:8',
        ]);
        if (Hash::check($request->input('old_password'), auth()->user()->password)) {
            $newpassword = Hash::make($request->input('password'));
            $user =  User::find(auth()->user()->id);
            $user->password = $newpassword;
            $user->save();
            $Kids = User::Where('account_of', auth()->user()->id)->get();
            if (count($Kids) > 0) {
                foreach ($Kids as $Kid) {
                    $Kid->password = $newpassword;
                    $Kid->save();
                }
            }
            return redirect()->back()->with(session()->flash('alert-success', 'password updated'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'password doesnt match'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        if ($request->file('UploadedFile') != "") {
            $filenamewithExt = $request->file('UploadedFile')->getClientOriginalName();
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('UploadedFile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('UploadedFile')->storeAs('public/ProfilePics', $fileNameToStore);
            if ($request->input('current_file') != "") {
                unlink(storage_path('app/public/ProfilePics/' . $request->input('wall_pic')));
            }
        } else {
            $fileNameToStore = $request->input('current_file');
        }

        $user = User::find(auth()->user()->id);
        $user->nick_name = $request->input('nick_name');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->address = $request->input('address');
        $user->profile_pic = ($fileNameToStore);
        $user->save();
        return redirect()->back()->with(session()->flash('alert-success', 'Account Updated'));
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
