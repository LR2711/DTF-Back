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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/usuarios', function () {
//     return 'asd';
// });

// Route::resource('/usuarios', 'UserController');

/**
 * DIET
 */


/**
 * DIETDETAIL
 */


/**
 * EXCERCISE
 */

/**
 * MEAL
 */


/**
 * ROUTINE
 */


/**
 * ROUTINEDETAIL
 */


/**
 * TRAINER
 */


/**
 * USER
 */
// Route::get('/usuarios', 'App\Http\Controllers\UserController@index');
// Route::get('/usuarios/{campo}/{valor}', 'App\Http\Controllers\UserController@getUser')->name('getUser');
// Route::get('/usuarios/actualizar/{email}/{campo}/{valor}', 'App\Http\Controllers\UserController@updateUser')->name('updateUser');
// Route::post('/usuarios/registrar', 'App\Http\Controllers\UserController@storeUser')->name('storeUser');
//OPCIONAL QUE CREO QUE SERÁ EL QUE SE UTILIZARÁ
// Route::resource('users', 'App\Http\Controllers\UserController')->names('users')->parameters(['users' => 'user']);
// Route::resource('users', 'App\Http\Controllers\UController')->names('users')->parameters(['users' => 'user']);
// Route::resource('users', UserController::class);

