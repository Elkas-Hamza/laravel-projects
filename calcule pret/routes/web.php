<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;

Route::post('/calculate-loan', [LoanController::class, 'calculate'])->name('calculate.loan');

Route::get('/', function () {
    return view('calcul');
});
