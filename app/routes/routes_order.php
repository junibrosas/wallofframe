<?php
// Administrator Routes
Route::group( [ 'before' => ['auth', 'auth.admin.only'], 'prefix' => 'admin', 'namespace' => 'Admin' ], function (){
    // Orders
    Route::get('orders/{filter?}', ['as' => 'admin.orders', 'uses' => 'OrderController@orders']);
    Route::get('orders/new', ['as' => 'admin.orders.new', 'uses' => 'OrderController@newOrder']);

    Route::post('orders/actions', ['as' => 'admin.orders.action', 'uses' => 'OrderController@postBulkActions']);
    Route::post('orders/store', ['as' => 'admin.orders.store', 'uses' => 'OrderController@postStoreNewOrder']);
    Route::post('orders/filter', ['as' => 'admin.orders.filter', 'uses' => 'OrderController@postFilterOrder']);
});

// Auth Routes
Route::group( [ 'before' => ['auth'], 'namespace' => 'Admin' ], function (){
    // Orders
    Route::get('order/{number}', ['as' => 'single.order', 'uses' => 'OrderController@order']);
});
