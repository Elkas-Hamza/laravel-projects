<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

Route::get('/', [CurrencyController::class, 'index']);
Route::post('/', [CurrencyController::class, 'convert'])->name('convert');
