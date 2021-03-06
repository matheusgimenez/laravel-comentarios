<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Comments@show_all' );

Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::post('/register', 'RegisterUser@register_user' );

Route::post('/login', 'LoginUser@login_user' );
Route::get('/logout', 'LoginUser@logout_user' );

// rotas para o mural de comentarios
Route::post('/post', 'Comments@new' );

