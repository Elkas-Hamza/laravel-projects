<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BMICalculatorController;

Route::get('/', [BilletController::class, 'index'])->name('billet.index');
Route::post('/calculer-prix', [BilletController::class, 'calculerPrix'])->name('billet.calculer');
Route::post('/reserver', [BilletController::class, 'reserver'])->name('billet.reserver');
