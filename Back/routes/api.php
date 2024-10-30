<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('signup', 'App\Http\Controllers\API\Auth\AuthApiController@signup')->name('auth.signup');
    Route::post('login', 'App\Http\Controllers\API\Auth\AuthApiController@login')->name('auth.login');
    Route::post('logout', 'App\Http\Controllers\API\Auth\AuthApiController@logout')->middleware('auth:sanctum')->name('auth.logout');
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::apiResource('users', 'App\Http\Controllers\API\UserApiController');
});
