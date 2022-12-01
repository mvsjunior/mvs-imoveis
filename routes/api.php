<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PropertyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
Route::group([ 'middleware' => 'api', 'prefix' => 'auth' ], function ($router) {
    Route::post('login',   [AuthController::class, 'login'])->name('api.login');
    Route::get('login',    [AuthController::class, 'login'])->name('api.login');
    Route::post('logout',  [AuthController::class, 'logout'])->name('api.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('api.auth-refresh');
    Route::post('me',      [AuthController::class, 'me'])->name('api.auth-me');
});

/*
|--------------------------------------------------------------------------
| Properties Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->get('/properties',              [PropertyController::class, 'index'])->name('api.properties');
Route::middleware('auth')->get('/properties/{id}',         [PropertyController::class, 'select'])->name('api.propertiesSelect');
Route::middleware('auth')->post('/properties',             [PropertyController::class, 'create'])->name('api.propertiesCreate');
Route::middleware('auth')->post('/properties/{id}/update', [PropertyController::class, 'update'])->name('api.propertiesUpdate');
Route::middleware('auth')->delete('/properties/{id}/delete', [PropertyController::class, 'delete'])->name('api.propertiesDelete');
