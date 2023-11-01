<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $adminRoleId;
    protected $agecyRoleId;
    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
        $this->adminRoleId = 1;
        $this->agecyRoleId = 2;
    }


    public function login(UserLoginRequest $request)
    {
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request))
        {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request))
        {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    protected function attemptLogin(UserLoginRequest $request)
    {
        $check_user = User::where('email', $request['email'])->first();
        if($check_user && Hash::check($request['password'], $check_user->password))
        {
            if($check_user['status'] == 'pending')
            {
                Session::flash('message', 'Your account status pending, Please contact to admin for account verification.');
                return redirect()->back();
            }

            if($role = $check_user->roles->first())
            {
                if($role->id == $this->adminRoleId || $role->id == $this->agecyRoleId)
                {
                    if($this->guard()->attempt( $this->credentials( $request)))
                    {
                        return true;
                    }
                }
                else
                {
                    flash("You don't have permission to login from web.", 'error');
                    return redirect()->back();
                }
            }
            return false;
        }
        return false;
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }
}
