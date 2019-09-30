<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use App\User;
use \Auth;

class Comments extends Controller
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
     * Verifica a mensagem, sanitiza e salva no banco
     * @param Request $request 
     * @return type
     */
    public function new( Request $request ) {
    	$msg = $request->all();
    	$msg = htmlspecialchars(strip_tags( $msg[ 'msg' ] ));
    	$timestamp = now();
    	$user_id = Auth::user()->id;
    	$this->create_comment( $msg, $timestamp, $user_id );
    	return redirect( '/' );
    }
    protected function create_comment( $msg, $timestamp, $user_id ) {
    	$result = DB::table('comments')->insert(
    		['user_id' => $user_id, 'text' => $msg, 'created_at' => $timestamp]
    	);
    }
}
