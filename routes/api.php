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
Route::get('/showUserRoutine', 'App\Http\Controllers\UserController@showUserRoutine');
Route::get('/showUserRoutineA/{user}', 'App\Http\Controllers\UserController@showUserRoutine2');

/**
 * ROUTINE
 */
Route::get('/showRoutine/{routine}', 'App\Http\Controllers\RoutineController@showRoutine');
Route::get('/showUserRoutineB/{user}', 
'App\Http\Controllers\RoutineController@showUserRoutineB'); 

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