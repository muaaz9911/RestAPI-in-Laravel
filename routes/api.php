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

//routs with passport token

// Route::post('register', 'Api\AuthController@register');
// Route::post('login', 'Api\AuthController@login');
// Route::apiResource('product','ProductController')->middleware('auth:api');




//routs with jwt token 
Route::post('login', 'ApiController@login');
Route::post('register', 'ApiController@register');
Route::apiResource('product','ProductController')->middleware('auth.jwt:api');