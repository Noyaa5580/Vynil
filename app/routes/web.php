<?php
use \App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/api/products', [ApiController::class, 'index']);
Route::get('/api/products/{id}', [ApiController::class, 'show']);
Route::post('/api/products', [ApiController::class, 'store']);
Route::put('/api/products/{id}', [ApiController::class, 'update']);
Route::delete('/api/products/{id}', [ApiController::class, 'destroy']);



Route::get('{any?}', fn () => view('app'))->where('any','.*');