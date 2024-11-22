<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MathController;

Route::get('/calculate', [MathController::class, 'showForm']); // Affiche le formulaire
Route::post('/calculate', [MathController::class, 'calculate']); // Traite les calculs

use App\Http\Controllers\JsonController;

Route::get('/sort-names', [JsonController::class, 'sortNames']);
Route::get('/teams', [JsonController::class, 'showTeams']);
Route::post('/teams/edit', [JsonController::class, 'editTeam']);
Route::post('/teams/delete', [JsonController::class, 'deleteTeam']);
Route::post('/teams/create',  [TeamController::class, 'createTeam']);