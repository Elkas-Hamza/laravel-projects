<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::resource('teams', TeamController::class);
