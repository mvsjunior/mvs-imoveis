<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'auth'], function() {
    Route::get('/login',     [AuthController::class, 'index'])->name('login');
    Route::post('/login',    [AuthController::class, 'login'])->name('login');
    Route::get('/register',  [AuthController::class, 'pageRegister'])->name('pageRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::middleware('auth:web')->get('/me', [AuthController::class, 'me'])->name('me');
    Route::middleware('auth:web')->get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:web'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/properties', [AdminController::class, 'properties'])->name('admin.properties');
} );