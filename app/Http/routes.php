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
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'UserController@store');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);

/*Route::get('/contacts', 'ContactController@index');
Route::get('/contacts/add', 'ContactController@create');
Route::post('/contacts/store', 'ContactController@store');

Route::get('/contacts/edit/{id}', 'ContactController@edit');
Route::post('/contacts/update/{id}', 'ContactController@update');

Route::post('/contacts/update/{id}', 'ContactController@update');
Route::get('/contacts/delete/{id}', 'ContactController@destroy');*/