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
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('exhibitions', 'App\Http\Controllers\Api\ExhibitionController');
});
|
*/
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('exhibitions', 'App\Http\Controllers\Api\ExhibitionController');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('exhibitions', 'App\Http\Controllers\Api\ExhibitionController');


Route::apiResource('categories', 'App\Http\Controllers\CategoryController');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');