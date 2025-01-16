
<?php
use \App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [ApiController::class, 'indexUser']);
Route::get('/users/{id}', [ApiController::class, 'showUser']);

Route::get('/products', [ApiController::class, 'index']);
Route::get('/products/{id}', [ApiController::class, 'show']);
Route::get('/pagination/start={start}&lim={limit}', [ApiController::class, 'limited']);
Route::post('/products', [ApiController::class, 'store']);
Route::put('/products/{id}', [ApiController::class, 'update']);
Route::delete('/products/{id}', [ApiController::class, 'destroy']);