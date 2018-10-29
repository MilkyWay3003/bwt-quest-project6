<?php

use Illuminate\Http\Request;

Route::namespace('Api')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
});

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::namespace('Api')->group(function () {
        Route::apiResource('hotels', 'HotelController');
        Route::apiResource('rooms', 'RoomController');
    });
});
