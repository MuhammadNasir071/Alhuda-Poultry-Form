<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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
    protected function register(RegisterRequest $request)
    {
        DB::beginTransaction();

        do
        {
            $username = $request->name.'-'.rand(100, 999);
        } //check if the name already exists and if it does, try again
        while(User::where('username', $username)->first());

        $email = $request['email'];
        $title = "Registration Email";
        $content = "New Account Register";
        try
        {
            Mail::send('emails.registration_email', ['name' => $request['name'], 'email' => $email, 'title' => $title, 'content' => $content], function ($message) use ($email) {
                $message->to($email)->subject('Registration Email!');
            });
        }
        catch(\Exception $e){

            flash('smtp error cannot send mail', 'error');
            return redirect()->back();
        }
        try
        {
            $newUser =  User::create([
                'full_name' => $request['name'],
                'username' => $username,
                'email' => $request['email'],
                'contact' => $request['contact'],
                'password' => Hash::make($request['password']),
                'status' => 'pending',
            ]);

            $newUser->roles()->attach(2);
            DB::commit();

        }
        catch(\Exception $e)
        {
            DB::rollBack();
            dd($e);
        }

        Session::flash('message', 'Your are register successfully!. <br> Account unverified, Please wait for admin to approve your account. Also check your email.');
        return redirect()->back();
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */

    protected function guard()
    {
        return Auth::guard();
    }
}
