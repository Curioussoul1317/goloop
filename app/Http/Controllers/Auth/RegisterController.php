<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nic' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     return User::create([
    //         // 'name' => $data['name'],
    //         // 'email' => $data['email'],
    //         // 'password' => Hash::make($data['password']),

    //         'nic' => $data['nic'],
    //         'phone' => $data['phone'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //         'verification_code' => sha1(time()),
    //         'account_type' => 'user',
    //         'account_status' => 0,
    //     ]);
    // }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'nic' => ['required', 'string', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if ($request->verify == 'email') {

            $user = new User();
            $user->full_name = $request->full_name;
            $user->nic = $request->nic;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->verification_code = sha1(time());
            $user->account_type = 'user';
            $user->is_verified = 1;
            $user->account_status = 0;
            $user->account_privacy = 0;
            $user->post_privacy = 0;
            $user->save();

            if ($user != null) {

                MailController::sendSignupEmail($user->full_name, $user->email, $user->verification_code);

                return redirect()->back()->with(session()->flash('alert-success', 'please check mail for verification'));
            } else {

                return redirect()->back()->with(session()->flash('alert-danger', 'We are sorry there has been a issue while registering'));
            }
        } elseif ($request->verify == 'phone') {

            $rndno = rand(1000, 9999);

            $user = new User();
            $user->full_name = $request->full_name;
            $user->nic = $request->nic;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->otp_code = $rndno;
            $user->verification_code = sha1(time());
            $user->account_type = 'user';
            $user->is_verified = 0;
            $user->account_status = 0;
            $user->account_privacy = 0;
            $user->post_privacy = 0;
            $user->save();

            if ($user != null) {
                return view('auth.verifyotp')->with('phone', $user->phone);
            } else {

                return redirect()->back()->with(session()->flash('alert-danger', 'We are sorry there has been a issue while registering'));
            }
        }
    }

    public function verifyEmail(Request $request)
    {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if ($user != null) {
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }
        return redirect()->route('login')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }

    public function verifyCode(Request $request)
    {
        $phone = $request->phone;
        $otp = $request->otp;
        $user = User::where(['phone' => $phone])->where(['otp_code' => $otp])->first();
        if ($user != null) {
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }
        return view('auth.verifyotp')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
    public function resendcode(Request $request)
    {
        $phone = $request->phone;
        $user = User::where(['phone' => $phone])->first();
        if ($user != null) {
            $rndno = rand(1000, 9999);
            $user->otp_code = $rndno;
            $user->save();
            return view('auth.verifyotp')->with('phone', $user->phone);
        }
        return view('auth.verifyotp')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
}
