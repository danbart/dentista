<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function(){
  return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
//Rutas de Citas
Route::get('/crear-cita/{user_id}', array(
  'as' => 'createCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@createCita'
));
Route::get('/lista-cita/{user_id}', array(
  'as' => 'listCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@getCitas'
));
Route::post('/create-cita', array(
  'as' => 'createCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@saveCita'
));
Route::get('/editar-cita/{cita_id}', array(
  'as' => 'editCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@editCita'
));
Route::post('/update-cita/{user_id}', array(
  'as' => 'updateCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@updateCita'
));
Route::get('/todas-citas', array(
  'as' => 'allCitas',
  'middleware' => 'auth',
  'uses' => 'CitasController@allCitas'
));
Route::get('/cancel-cita/{cita_id}', array(
  'as' => 'cancelCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@cancelCitaCliente'
));
Route::get('/up-cita/{cita_id}', array(
  'as' => 'upCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@atendioCita'
));
Route::get('/cancel-cita-all/{cita_id}', array(
  'as' => 'cancelCita',
  'middleware' => 'auth',
  'uses' => 'CitasController@cancelCita'
));
// seccion de usuario

Route::get('/editar-usuario/{users_id}', array(
  'as' => 'editUser',
  'middleware' => 'auth',
  'uses' => 'UserController@userEdit'
));

Route::post('/update-user/{user_id}', array(
  'as' => 'updateUser',
  'middleware' => 'auth',
  'uses' => 'UserController@UpdateUser'
));

Route::get('/registrar-usuario', array(
  'as' => 'regUserAdmin',
  'middleware' => 'auth',
  'uses' => 'UserController@regUserAdmin'
));
Route::post('/registrar-usuario', array(
  'as' => 'regUserAdmin',
  'middleware' => 'auth',
  'uses' => 'UserController@regUserAdminPost'
));
Route::get('/delete-user/{user_id}', array(
  'as' => 'deletUser',
  'middleware' => 'auth',
  'uses' => 'UserController@deleteUser'
));
