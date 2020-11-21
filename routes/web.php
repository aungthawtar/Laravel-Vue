<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;


Route::get('/', function () {
    return view('admin/layouts/master');
});

// Route::get('/admin/product' , function(){
//     return view('admin/product/index');
// });


Route::get('/admin/post/create' , [ PostController ::class , 'create']);