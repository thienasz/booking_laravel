<?php

use Illuminate\Http\Request;

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

Route::post('auth/login', 'AuthController@login');

Route::group(['middleware' => 'auth:api'], function () {
    // user logout
    Route::post('auth/logout', 'AuthController@logout');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::resource('provider', 'ServiceProviderController');
    Route::resource('station', 'StationController');
    Route::resource('vehicle', 'VehicleController');
    Route::resource('ticket-agent', 'TicketAgentController');
});
