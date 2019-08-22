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
Route::get('/admin/umum/gedung/all', 'API_Umum@getGedungAll')->middleware('auth:api');
Route::get('/admin/umum/gedung/id/{id_gedung}', 'API_Umum@getGedungByID')->middleware('auth:api');
Route::get('/admin/umum/lantai/all', 'API_Umum@getLantaiAll')->middleware('auth:api');
Route::get('/admin/umum/lantai/gedung/id/{id_gedung}', 'API_Umum@getLantaiByGedungID')->middleware('auth:api');
Route::get('/admin/umum/lantai/id/{id_lantai}', 'API_Umum@getLantaiByID')->middleware('auth:api');
Route::get('/admin/umum/ruangan/all', 'API_Umum@getRuanganAll')->middleware('auth:api');
Route::get('/admin/umum/ruangan/lantai/id/{id_lantai}', 'API_Umum@getRuanganByLantaiID')->middleware('auth:api');
Route::get('/admin/umum/ruangan/id/{id_ruangan}', 'API_Umum@getRuanganByID')->middleware('auth:api');
Route::get('/admin/umum/agama/all', 'API_Umum@getAgamaAll')->middleware('auth:api');
Route::get('/admin/umum/agama/id/{id_agama}', 'API_Umum@getAgamaByID')->middleware('auth:api');
Route::get('/admin/umum/kewarga-negaraan/all', 'API_Umum@getKewargaNegaraanAll')->middleware('auth:api');
Route::get('/admin/umum/kewarga-negaraan/id/{id_kewarga_negaraan}', 'API_Umum@getKewargaNegaraanByID')->middleware('auth:api');
Route::get('/admin/umum/status-perkawinan/all', 'API_Umum@getStatusPerkawinanAll')->middleware('auth:api');
Route::get('/admin/umum/status-perkawinan/id/{id_status_perkawinan}', 'API_Umum@getStatusPerkawinanByID')->middleware('auth:api');
Route::get('/admin/umum/provinsi/all', 'API_Umum@getProvinsiAll')->middleware('auth:api');
Route::get('/admin/umum/provinsi/id/{id_provinsi}', 'API_Umum@getProvinsiByID')->middleware('auth:api');
Route::get('/admin/umum/kota/all', 'API_Umum@getKotaAll')->middleware('auth:api');
Route::get('/admin/umum/kota/provinsi/id/{id_provinsi}', 'API_Umum@getKotaByProvinsiID')->middleware('auth:api');
Route::get('/admin/umum/kota/id/{id_kota}', 'API_Umum@getKotaByID')->middleware('auth:api');
Route::get('/admin/umum/kecamatan/all', 'API_Umum@getKecamatanAll')->middleware('auth:api');
Route::get('/admin/umum/kecamatan/kota/id/{id_kota}', 'API_Umum@getKecamatanByKotaID')->middleware('auth:api');
Route::get('/admin/umum/kecamatan/id/{id_kecamatan}', 'API_Umum@getKecamatanByID')->middleware('auth:api');
Route::get('/admin/umum/kelurahan/all', 'API_Umum@getKelurahanAll')->middleware('auth:api');
Route::get('/admin/umum/kelurahan/kecamatan/id/{id_kecamatan}', 'API_Umum@getKelurahanByKecamatanID')->middleware('auth:api');
Route::get('/admin/umum/kelurahan/id/{id_kelurahan}', 'API_Umum@getKelurahanByID')->middleware('auth:api');

Route::put('/user/edit/{id_user}', 'API_User@update')->middleware('auth:api');
Route::put('/user/profile/edit', 'API_User@updateProfile')->middleware('auth:api');
Route::put('/admin/super/level-user/edit/{id_level}', 'API_SuperAdmin@updateLevelUser')->middleware('auth:api');

Route::delete('/user/delete/{id_user}', 'API_User@delete')->middleware('auth:api');
Route::delete('/admin/super/level-user/delete/{id_level}', 'API_SuperAdmin@deleteLevelUser')->middleware('auth:api');

Route::post('/auth/signin', 'API_Authentication@signIn');
Route::post('/auth/signup', 'API_Authentication@signUp')->middleware('auth:api');
Route::post('/admin/super/level-user/create', 'API_SuperAdmin@createLevelUser')->middleware('auth:api');
Route::post('/admin/user/guest/create', 'API_AdminUser@createUserGuest')->middleware('auth:api');