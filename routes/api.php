<?php

use Illuminate\Http\Request;

// This is user path uri for api
Route::get('/user/profile', 'API_User@getProfile');
Route::get('/user/all', 'API_User@getAll')->middleware('auth:api');
Route::get('/user/all/level/{id_level}', 'API_User@getAllByLevel')->middleware('auth:api');
Route::get('/user/detail/{id_user}', 'API_User@getDetail')->middleware('auth:api');
Route::get('/user/deactive/{id_user}', 'API_User@deactive')->middleware('auth:api');
Route::get('/admin/umum/level-user/all', 'API_Umum@getUserLevelAll')->middleware('auth:api');
Route::get('/admin/umum/level-user/id/{id_level}', 'API_Umum@getUserLevelByID')->middleware('auth:api');

Route::put('/user/edit/{id_user}', 'API_User@update')->middleware('auth:api');
Route::put('/user/profile/edit', 'API_User@updateProfile')->middleware('auth:api');
Route::put('/admin/super/level-user/edit/{id_level}', 'API_SuperAdmin@updateLevelUser')->middleware('auth:api');

Route::delete('/user/delete/{id_user}', 'API_User@delete')->middleware('auth:api');
Route::delete('/admin/super/level-user/delete/{id_level}', 'API_SuperAdmin@deleteLevelUser')->middleware('auth:api');

Route::post('/auth/signin', 'API_Authentication@signIn');
Route::post('/auth/signup', 'API_Authentication@signUp')->middleware('auth:api');
Route::post('/admin/super/level-user/create', 'API_SuperAdmin@createLevelUser')->middleware('auth:api');
Route::post('/admin/user/guest/create', 'API_AdminUser@createUserGuest')->middleware('auth:api');