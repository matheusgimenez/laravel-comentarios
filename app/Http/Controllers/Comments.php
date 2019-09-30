<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use App\User;
use \Auth;
use DateTime;

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
    /**
     * Salva o comentario no banco de dados
     * @param string $msg 
     * @param DateTime $timestamp 
     * @param int $user_id 
     * @return void
     */
    protected function create_comment( $msg, $timestamp, $user_id ) {
    	$result = DB::table('comments')->insert(
    		['user_id' => $user_id, 'text' => $msg, 'created_at' => $timestamp]
    	);
    }
    /**
     * Prepara e Exibe a home do site
     */
    public function show_all() {
    	$all_posts = DB::table('comments')->orderBy('id','desc')->whereNotNull('text')->get();
    	$posts = array();
    	foreach ( $all_posts as $key => $post ) {
    		$posts[ $key ] = get_object_vars( $post );
    		$posts[ $key ][ 'user_name' ] = DB::table('users')->where('id', $post->user_id )->first();
    		$posts[ $key ][ 'user_name' ] = $posts[ $key ][ 'user_name' ]->name;
    		$date = new DateTime( $post->created_at );
    		$posts[ $key ][ 'date' ] = $date->format( 'd/m/Y h:m' );
    	}

    	return view( 'welcome', [ 'posts' => $posts ] );
    }
}
