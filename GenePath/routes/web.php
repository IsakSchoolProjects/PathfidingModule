<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// This is the landing page
Route::get('/', function () {
    return view('index');
});

// This is the create page
Route::get('/create', function () {
    return view('create');
});

// This is the edit page
Route::get('/edit', function () {
    return view('edit');
});

// This is the load page
Route::get('/load', function () {
    return view('load');
});