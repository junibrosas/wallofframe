<?php

Route::group( ['prefix' => '/'], function () {
    // Confide routes
    Route::get('signup',                    ['as' => 'signup', 'uses' => 'UsersController@create']);
    Route::get('login',                     ['as' => 'login', 'uses' => 'UsersController@login']);
    Route::get('users/confirm/{code}',      ['as' => 'confirm', 'uses' => 'UsersController@confirm']);
    Route::get('forgot_password',           ['as' => 'forgot.password', 'uses' => 'UsersController@forgotPassword']);
    Route::get('users/reset_password/{token}', ['as' => 'reset.password', 'uses' => 'UsersController@resetPassword']);
    Route::get('logout',                    ['as' => 'logout', 'uses' => 'UsersController@logout']);
    Route::post('users',                    ['as' => 'users.store', 'uses' => 'UsersController@store']);
    Route::post('users/login',              ['as' => 'users.auth', 'uses' => 'UsersController@doLogin']);
    Route::post('forgot_password',    ['as' => 'users.forgot.password', 'uses' => 'UsersController@doForgotPassword']);
    Route::post('users/reset_password',     ['as' => 'users.reset.password', 'uses' => 'UsersController@doResetPassword']);
} );

// User Profile
Route::group( ['prefix' => 'customer', 'namespace' => 'User'], function () {
    Route::get('add-wishlist',                 ['as' => 'customer.wishlist.add', 'uses' => 'CustomerController@addWishList']);
    Route::get('ajax-add-wishlist',            ['as' => 'customer.wishlist.ajax.add', 'uses' => 'CustomerController@addWishListThroughAjax']);
});

// Auth Users
Route::group( ['before' => ['auth'], 'prefix' => 'customer', 'namespace' => 'User'], function () {
    Route::get('account',                       ['before' => 'auth.admin', 'as' => 'customer.account', 'uses' => 'CustomerController@getAccount']);
    Route::get('wishlist',                      ['as' => 'customer.wishlist', 'uses' => 'CustomerController@getWishList']);
    Route::get('tracking',                      ['as' => 'customer.track.order', 'uses' => 'CustomerController@getTrackingOrder']);
    Route::get('change-password',               ['as' => 'password.change', 'uses' => 'CustomerController@getPassword']);
    Route::post('account/update',               ['as' => 'customer.account.update', 'uses' => 'CustomerController@updateAccount']);
    Route::post('change-password',               ['as' => 'password.update', 'uses' => 'CustomerController@changePassword']);


    // Shipping Address routes
    Route::post('add-address',                  ['as' => 'customer.address.add', 'uses' => 'CustomerController@addShippingAddress']);
    Route::post('get-address',                  ['as' => 'customer.address.get', 'uses' => 'CustomerController@getShippingAddress']);
    Route::post('remove-address',               ['as' => 'customer.address.get', 'uses' => 'CustomerController@removeShippingAddress']);

} );
