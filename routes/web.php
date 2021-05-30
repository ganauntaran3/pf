<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::middleware('checkGuest')->group(function () {
    route::get('/login', [AuthController::class, 'index']);
    route::post('/login/submit', [AuthController::class, 'login'])->name('login');
});


Route::prefix('admin')->middleware('checkAdmin')->group(function () {
    route::get('/', [AdminController::class, 'index'])->name('dashboard');
    route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    route::get('/accept/{id}', [AdminController::class, 'accept']);
    route::get('/decline/{id}', [AdminController::class, 'decline']);
    route::get('/accepted', [AdminController::class, 'accepted']);
    route::get('/declined', [AdminController::class, 'declined']);
    route::get('/export', [AdminController::class, 'export']);
});

route::get('/', [UserController::class, 'index']);
route::post('register', [UserController::class, 'postData'])->name('post.form');
route::get('/country', [UserController::class, 'searchCountry']);
route::get('/state', [UserController::class, 'searchState']);
route::get('/city', [UserController::class, 'searchCity']);

