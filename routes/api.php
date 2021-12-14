<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * USER
 */
Route::post('/register', 'App\Http\Controllers\UserController@register');
Route::post('/login', 'App\Http\Controllers\UserController@login');
Route::get('/user', 'App\Http\Controllers\UserController@getCurrentUser');
Route::post('/update', 'App\Http\Controllers\UserController@update');
Route::get('/logout', 'App\Http\Controllers\UserController@logout');
Route::get('/showUserRoutineBad', 'App\Http\Controllers\UserController@showUserRoutineBad');
Route::get('/showUserRoutine/{user_id}', 'App\Http\Controllers\UserController@showUserRoutine');
Route::get('/showUserRoutine2/{user_id}', 'App\Http\Controllers\UserController@showUserRoutine2');
Route::get('/showUserDiet/{user_id}', 'App\Http\Controllers\UserController@showUserDiet');
Route::get('/showUserDiet2/{user_id}', 'App\Http\Controllers\UserController@showUserDiet2'); 

/**
 * ROUTINE
 */
Route::post('/createRoutine', 'App\Http\Controllers\RoutineController@store');
Route::get('/show');

/**
 * ROUTINE DETAIL
 */


/**
 * EXCERCISE
 */
Route::get('/showExcercise/{excercise}', 'App\Http\Controllers\ExcerciseController@showExcercise');

/**
 * DIET
 */


/**
 * DIET DETAIL
 */