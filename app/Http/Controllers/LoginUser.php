<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use \Auth;

class LoginUser extends Controller
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

	/**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    /**
     * Verifica as credenciais e executa o login
     * @param Request $request 
     * @return type
     */
    public function login_user( Request $request ) {
    	$email = $_POST[ 'email' ];
    	$password = $_POST[ 'password' ];
    	if ( Auth::attempt(['email' => $email, 'password' => $password ], true ) ) {
    		return redirect('/')->with('yourParams', array( 'logged', 'true' ) );
    	}
    	else {
    		return redirect('/login/?fail=true');
    	}
    }
    public function logout_user() {
    	Auth::logout();
    	return redirect('/');
    }
}
