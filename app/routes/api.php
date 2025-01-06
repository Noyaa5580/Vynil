
<?php
use \App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [ApiController::class, 'index']);
Route::get('/products/{id}', [ApiController::class, 'show']);
Route::post('/products', [ApiController::class, 'store']);
Route::put('/products/{id}', [ApiController::class, 'update']);
Route::delete('/products/{id}', [ApiController::class, 'destroy']);