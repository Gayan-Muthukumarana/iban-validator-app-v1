<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\IbanValidityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login'])->name('api.login');
Route::get('user', [AuthController::class, 'user'])->middleware('auth:api')->name('api.user');
Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('check-validity', [IbanValidityController::class, 'checkValidity'])->name('api.check-validity');
