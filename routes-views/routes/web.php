<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.accueil');
});

Route::get('/apropos', function () {
    return view('pages.apropos');
});
