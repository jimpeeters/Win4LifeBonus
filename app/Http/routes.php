<?php 


Route::get('/', 'HomeController@index');

//Code valideren
Route::post('/code', array('as' => 'code', 'uses' => 'CodeController@store'));

//Authentication 
Route::post('auth/login', 'Auth\AuthController@login');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Registration 
Route::post('/register','Auth\AuthController@register');

//Dashboard 
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
    Route::get('/dashboard', 'UserController@index');
	Route::get('/dashboard/delete/{id}', 'UserController@destroy');
	Route::get('/dashboard/restore/{id}', 'UserController@restore');
});



