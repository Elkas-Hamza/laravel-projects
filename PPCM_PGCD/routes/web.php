<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MathController;

Route::get('/', [MathController::class, 'index']); // Set home route to MathController
Route::post('/', [MathController::class, 'index']); // Allow POST requests to the same route
