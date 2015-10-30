<?php 


Route::get('/', 'HomeController@index');

Route::post('/code', array('as' => 'code', 'uses' => 'CodeController@store'));


// Authentication routes...
Route::post('auth/login', 'Auth\AuthController@login');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
/*Route::post('auth/register', 'Auth\AuthController@postRegister');*/
Route::post('/register','Auth\AuthController@register');


Route::controllers([
    'password' => 'Auth\PasswordController',
]);
