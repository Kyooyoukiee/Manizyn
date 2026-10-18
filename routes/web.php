<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalisisController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/analisis', [AnalisisController::class, 'analisis']);