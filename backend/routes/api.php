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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("meal", "MealController@indexApi");
Route::get("meal/{meal}", "MealController@showApi");
Route::get("event", "EventController@indexApi");
Route::get("event/month/{month}", "EventController@filterMonthApi");
Route::get("event/{event}", "EventController@showApi");

