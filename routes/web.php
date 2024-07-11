<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimezoneController;

Route::get('/', [TimezoneController::class, 'index'])->name('index');
Route::post('/get-time', [TimezoneController::class, 'getTime'])->name('get-time');
