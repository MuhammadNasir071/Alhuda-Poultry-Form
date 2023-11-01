<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // User role
        $role = Auth::user()->roles->first();
        // Check user role
        if($role->id)
        {
            switch ($role->id)
            {
                case 1:
                    return redirect(route('admin.dashboard'));
                    break;
                case 2:
                    return redirect(route('admin.dashboard'));
                    break;
                case 3:
                    flash("You don't have permission to login from web", 'error');
                    return redirect(route('login'))->with(Auth::logout());
                    break;
                default:
                    flash("You don't have permission to login from web", 'error');
                    return redirect(route('login'))->with(Auth::logout());
                    break;
            }
        }
        else
        {
            flash("You don't have permission to login from web", 'error');
            return redirect(route('login'))->with(Auth::logout());

        }

    }
}
