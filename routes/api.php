<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IbanController;
use App\Http\Controllers\IbanValidityController;
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

Route::post('admin-login', [AdminAuthController::class, 'login'])->name('api.admin.login');
Route::get('admin-user', [AdminAuthController::class, 'user'])->middleware('auth:api')->name('api.admin.user');
Route::get('iban-data', [IbanController::class, 'ibanData'])->name('api.admin.iban-data');
