<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\WordleController;

Route::get('/', [WordleController::class, 'index']);
Route::post('/guess', [WordleController::class, 'guess']);