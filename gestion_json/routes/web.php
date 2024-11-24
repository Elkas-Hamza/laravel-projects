<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;

Route::resource('teams', TeamController::class);
Route::get('/teams/{teamId}/players/create', [TeamController::class, 'createPlayer'])->name('players.create');
Route::post('/teams/{teamId}/players', [TeamController::class, 'addPlayer'])->name('players.add');
Route::get('/teams/{teamId}/players/{playerId}/edit', [TeamController::class, 'editPlayer'])->name('players.edit');
Route::put('/teams/{teamId}/players/{playerId}', [TeamController::class, 'updatePlayer'])->name('players.update');
Route::delete('/teams/{teamId}/players/{playerId}', [TeamController::class, 'deletePlayer'])->name('players.delete');
