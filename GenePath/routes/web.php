<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoadController;
use App\Http\Controllers\CreateController;

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

// Recieve the create-form inputs
Route::post('/create/insert/', [CreateController::class, 'create'])->name('create-new-world');;

// Shows all the worlds from the database
Route::get('/load', [LoadController::class, 'ShowWorlds']);
// Shows all the rooms from the database
Route::get('/edit/{id}', [loadController::class, 'ShowRooms']);

// This is the view page
Route::get('/view', function () {
    return view('view');
});