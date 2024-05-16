<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LessonsController;

Route::get('/', [LessonsController::class, 'index']);
Route::get('/employee/{id}',[LessonsController::class, 'show']);