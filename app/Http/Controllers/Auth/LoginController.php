<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    
  //  protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

//---------Redireccionar por roles------------
    public function redirectPath()
    {
        if(auth()->user()->authorizeRolesLogin('user')){
         return '/inicio';
       }
        if(auth()->user()->authorizeRolesLogin('admin')){
         return '/admin';
       }
       if(auth()->user()->authorizeRolesLogin('comentarista')){
         return '/inicio';
       }

    }
    

}
