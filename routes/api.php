<?php
/** Example routes */
Route::prefix('user')->group(function() {
    Route::post('/details', 'Auth\UserController@details');
    Route::get('/{id}', 'Auth\UserController@findById');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/register', 'Auth\RegisterController@register');
});

Route::prefix('users')->group(function() {
    Route::get('/', 'Auth\UserController@list');
});