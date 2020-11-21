<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;

// Product Route
Route::get('/product', [ ProductController :: class , 'index']);
Route::post('/product', [ ProductController :: class , 'store']);
Route::get('/product/{id}', [ ProductController :: class , 'show']);
Route::patch('/product/{id}', [ ProductController :: class , 'update']);
Route::delete('/product/{id}', [ ProductController :: class , 'destroy']);


// Post Route
Route::get('/post', [ PostController :: class , 'index']);
Route::get('/post/create', [ PostController :: class , 'create']);
Route::post('/post', [ PostController :: class , 'store']);
Route::get('/post/{id}', [ PostController :: class , 'show']);
Route::patch('/post/{id}', [ PostController :: class , 'update']);
Route::delete('/post/{id}', [ PostController :: class , 'destroy']);

// Category Route
Route::get('/category', [CategoryController :: class , 'index']);
Route::post('/category', [CategoryController :: class , 'store']);
Route::patch('/category/{id}', [CategoryController :: class , 'update']);
Route::delete('/category/{id}', [CategoryController :: class , 'destroy']);