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

// Route::get('/', function () {
//     return view('welcome');
// });

route::get('/', [AdminController::class, 'index'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

