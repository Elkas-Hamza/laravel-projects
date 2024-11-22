<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BMICalculatorController;

Route::get('/', [BMICalculatorController::class, 'index']);
Route::post('/calculate', [BMICalculatorController::class, 'calculate'])->name('calculate');
