<?php

Route::apiResource('/users', 'Api\UserController');
Route::apiResource('/profiles', 'Api\ProfileController');
Route::apiResource('/permissions', 'Api\PermissionController');

Route::get('/user/{id}/profiles', 'Api\ProfileUserController@userProfiles')->name('user.profiles');