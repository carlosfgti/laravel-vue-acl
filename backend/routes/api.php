<?php

Route::post('login', 'Api\Auth\LoginController@login');
Route::post('register', 'Api\Auth\LoginController@register');


Route::group(['middleware' => []], function () {
    Route::apiResource('/posts', 'Api\PostController');
    Route::apiResource('/categories', 'Api\CategoryController');
    Route::apiResource('/users', 'Api\UserController');//->middleware('can:users');
    Route::apiResource('/profiles', 'Api\ProfileController');
    Route::apiResource('/permissions', 'Api\PermissionController');

    Route::get('/user/{id}/profiles', 'Api\ProfileUserController@userProfiles')->name('user.profiles');
    Route::get('/user/{id}/profiles-not-linked', 'Api\ProfileUserController@profilesNotLinkedUser')->name('user.profiles.not.linked');
    Route::post('/user/{id}/profiles', 'Api\ProfileUserController@userAddProfiles')->name('user.add.profiles');

    Route::get('/profile/{id}/permissions', 'Api\PermissionProfileController@profilePermissions')->name('profile.permissions');
    Route::get('/profile/{id}/permissions-not-linked', 'Api\PermissionProfileController@permissionsNotLinkedProfile')->name('profile.permissions.not.linked');
    Route::post('/profile/{id}/permissions', 'Api\PermissionProfileController@profileAddPermissions')->name('profile.add.permissions');
});
