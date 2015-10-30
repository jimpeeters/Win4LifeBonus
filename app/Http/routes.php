<?php 


Route::get('/', 'HomeController@index');

//code route
Route::post('/code', array('as' => 'code', 'uses' => 'CodeController@store'));

// Authentication routes...
Route::post('auth/login', 'Auth\AuthController@login');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration route
Route::post('/register','Auth\AuthController@register');

// Dashboard 
Route::get('dashboard', ['uses' => 'UserController@index', 'middleware' => 'auth']);
/*Route::get('/dashboard', 'UserController@index');*/
Route::get('/dashboard/delete/{id}', 'UserController@destroy');
Route::get('/dashboard/restore/{id}', 'UserController@restore');

/*Route::controllers([
    'password' => 'Auth\PasswordController',
]);
*/