<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

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
Route::middleware('checkGuest')->group(function () {
    route::get('/login', [AuthController::class, 'index']);
    route::post('/login/submit', [AuthController::class, 'login'])->name('login');
});


Route::prefix('admin')->middleware('checkAdmin')->group(function () {
    route::get('/', [AdminController::class, 'index'])->name('dashboard');
    route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    route::get('/accept/{id}', [UserController::class, 'accept']);
    route::post('/decline/{id}', [UserController::class, 'decline']);
});

route::get('/', [UserController::class, 'index']);
route::post('register', [UserController::class, 'postData'])->name('post.form');
route::get('/country', [UserController::class, 'searchCountry']);
route::get('/state', [UserController::class, 'searchState']);
route::get('/city', [UserController::class, 'searchCity']);
