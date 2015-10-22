<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*Route::get('/', function()
{
	return View::make('welcome');
});*/

Route::get('/', 'HomeController@index');

/*Route::resource('user', 'UserController');
Route::resource('code', 'CodeController');
*/
Route::post('/code', array('as' => 'code', 'uses' => 'CodeController@store'));


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');

//login fail
Route::get('/login', 'HomeController@loginFail');

Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);
