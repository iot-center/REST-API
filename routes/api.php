<?php

use Illuminate\Http\Request;

// This is user path uri for api
Route::get('/user/profile', 'API_User@getProfile');
Route::get('/user/all', 'API_User@getAll')->middleware('auth:api');
Route::get('/user/detail/{user_id}', 'API_User@getDetail')->middleware('auth:api');
Route::get('/user/deactive/{user_id}', 'API_User@deactive')->middleware('auth:api');
Route::put('/user/edit/{user_id}', 'API_User@update')->middleware('auth:api');
Route::put('/user/profile/edit', 'API_User@updateProfile')->middleware('auth:api');
Route::delete('/user/delete/{user_id}', 'API_User@delete')->middleware('auth:api');

