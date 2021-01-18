<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::group(['prefix' => '/auth'], function () {
    Route::get('/login', [AuthController::class, 'showLoginForm']);
    Route::get('/register', [AuthController::class, 'showRegisterForm']);

    Route::post('/login', [AuthController::class, 'handleLogin'])->name('login');
    Route::post('/register', [AuthController::class, 'handleRegister']);
});

Route::group(['prefix' => '/cv', 'middleware' => ['auth']], function() {
    Route::get('/', [CVController::class, 'showCV'])->excludedMiddleware(['auth']);
    Route::get('/search/{keyword}', [CVController::class, 'searchCV'])->excludedMiddleware(['auth']);
    Route::get('/my-cv', [CVController::class, 'showUserCV']);
    Route::get('/create', [CVController::class, 'createCV']);
    Route::post('/', [CVController::class, 'storeCV']);
});