<?php

use App\Http\Controllers\Auth\AuthController;
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

Route::POST('registration',[AuthController::class,'registration']);
Route::POST('login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::GET('profile',[AuthController::class,'profile']);
});
