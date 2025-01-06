<?php
// use \App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;




Route::get('{any?}', fn () => view('app'))->where('any','.*');