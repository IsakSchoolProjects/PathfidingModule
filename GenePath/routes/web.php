<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoadController;
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

// Shows all the worlds from the database
Route::get('/load', [LoadController::class, 'ShowWorlds']);
// Shows all the rooms from the database
Route::get('/edit', [loadController::class, 'ShowRooms']);

// This is the view page
Route::get('/view', function () {
    return view('view');
});