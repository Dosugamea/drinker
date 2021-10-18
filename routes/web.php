<?php

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

use App\Http\Controllers\TwitterLoginController;
Route::get('auth/login/twitter', [TwitterLoginController::class, 'redirectToProvider']);
Route::get('auth/twitter/callback',[TwitterLoginController::class, 'handleProviderCallback']);

Route::get('/', function () {
    return view('index');
});
