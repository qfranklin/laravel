<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\CryptoPriceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\PasswordResetController;

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

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::post('password/email', [PasswordResetController::class, 'sendResetLinkEmail']);
Route::post('password/reset', [PasswordResetController::class, 'reset']);

Route::get('/crypto/get-prices', [CryptoPriceController::class, 'getPrices']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'store'])->middleware('can:isAdmin');
    Route::post('/products/{id}', [ProductController::class, 'update'])->middleware('can:isAdmin');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->middleware('can:isAdmin');
    Route::get('/user/{identifier}', [UserController::class, 'getUserData']);
    Route::get('/users', [UserController::class, 'index'])->middleware('can:isAdmin');
    Route::get('/notes', [NotesController::class, 'index']);
    Route::post('/notes', [NotesController::class, 'store']);
    Route::put('/user/update/{id}', [UserController::class, 'update']);
});
