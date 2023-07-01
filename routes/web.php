<?php

use App\Http\Controllers\CoachController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// получить все записи (вывод всех тренеров)
Route::get('/coaches/all', [CoachController::class, 'coaches']);
