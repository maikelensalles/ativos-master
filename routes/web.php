<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('novidades', 'NovidadeController')->middleware('auth');

Route::resource('contratos', 'ContratoController')->middleware('auth');

Route::resource('setors', 'ContratoSetorController')->middleware('auth');

Route::resource('propostas', 'ContratoUserController')->middleware('auth');

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('cadastros', ['as' => 'cadastros.create', 'uses' => 'UserController@create']);
	Route::get('cadastros', ['as' => 'cadastros.index', 'uses' => 'CadastroController@index']); 
	Route::post('cadastros', ['as' => 'cadastros.store', 'uses' => 'CadastroController@store']);
	Route::put('cadastros', ['as' => 'cadastros.update', 'uses' => 'CadastroController@update']);
	Route::get('cadastros', ['as' => 'cadastros.edit', 'uses' => 'CadastroController@edit']);

});

Route::group(['middleware' => 'auth'], function () {
	Route::get('bancarios', ['as' => 'bancarios.create', 'uses' => 'BancarioController@create']);
	Route::get('bancarios', ['as' => 'bancarios.index', 'uses' => 'BancarioController@index']); 
	Route::post('bancarios', ['as' => 'bancarios.store', 'uses' => 'BancarioController@store']);
	Route::put('bancarios', ['as' => 'bancarios.update', 'uses' => 'BancarioController@update']);
	Route::get('bancarios', ['as' => 'bancarios.edit', 'uses' => 'BancarioController@edit']);
});
	
