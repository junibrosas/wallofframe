<?php
use Iboostme\Email\EmailRepository;
use Iboostme\Product\ProductRepository;
use Laracasts\Utilities\JavaScript\Facades\JavaScript;
use Intervention\Image\Facades\Image;
use Iboostme\Product\ProductFormatter;
use Iboostme\Transaction\TransactionRepository;
Route::get('test', function(){
    trace( Session::get('product_bag') );
});
