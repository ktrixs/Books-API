<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectTo() {
        switch (Auth::user()->is_admin) {
            case '0':
                # code...
                $this->redirectTo = '/user';
                return $this->redirectTo;
                break; 
            case '1':
                # code...
                $this->redirectTo = '/admin';
                return $this->redirectTo;
                break;           
            default:
                # code...
                $this->redirectTo = '/login';
                return $this->redirectTo;
                break;
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
