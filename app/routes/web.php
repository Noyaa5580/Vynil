<?php
// use \App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RegAuthController;
Route::post('/register', [RegAuthController::class, 'register']);
Route::post('/auth', [RegAuthController::class, 'auth']);
Route::get('/logout', [RegAuthController::class, 'logout']);



Route::get('{any?}', fn() => view('app'))->where('any', '.*');