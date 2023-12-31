<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [\App\Http\Controllers\UserController::class, 'register']);

Route::post('login', [\App\Http\Controllers\UserController::class, 'login']);

// ADMINISTRADOR
Route::prefix('/administrator')->middleware('auth:api')->group(function () {
    Route::get('', [\App\Http\Controllers\AdministratorController::class, 'index'])->middleware('can:view-user');
    Route::get('/{id}', [\App\Http\Controllers\AdministratorController::class, 'show'])->middleware('can:view-user');
    Route::post('', [\App\Http\Controllers\AdministratorController::class, 'store'])->middleware('can:create-user');
    Route::put('/{id}', [\App\Http\Controllers\AdministratorController::class, 'update'])->middleware('can:update-user');
    Route::delete('/{id}', [\App\Http\Controllers\AdministratorController::class, 'delete'])->middleware('can:delete-user');
});

// MODERADOR
Route::prefix('/moderator')->middleware('auth:api')->group(function () {
    Route::get('', [\App\Http\Controllers\ModeratorController::class, 'index'])->middleware('can:view-user');
    Route::get('/{id}', [\App\Http\Controllers\ModeratorController::class, 'show'])->middleware('can:view-user');
    Route::post('', [\App\Http\Controllers\ModeratorController::class, 'store'])->middleware('can:create-user');
    Route::put('/{id}', [\App\Http\Controllers\ModeratorController::class, 'update'])->middleware('can:update-user');
    Route::delete('/{id}', [\App\Http\Controllers\ModeratorController::class, 'delete'])->middleware('can:delete-user');
});

Route::prefix('/financial')->middleware('auth:api')->group(function () {
    Route::get('', [\App\Http\Controllers\FinancialController::class, 'index'])->middleware('can:view-user');
    Route::get('/{id}', [\App\Http\Controllers\FinancialController::class, 'show'])->middleware('can:view-user');
    Route::post('', [\App\Http\Controllers\FinancialController::class, 'store'])->middleware('can:create-user');
    Route::put('/{id}', [\App\Http\Controllers\FinancialController::class, 'update'])->middleware('can:update-user');
    Route::delete('/{id}', [\App\Http\Controllers\FinancialController::class, 'delete'])->middleware('can:delete-user');
});




