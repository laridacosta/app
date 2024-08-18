<?php


use App\Http\Controllers\TimeController;
use Illuminate\Support\Facades\Route;

// Rota para exibir o formulário
Route::get('/', [TimeController::class, 'index'])->name('home');

// Rota para obter o tempo (essa já existe)
Route::post('/getTime', [TimeController::class, 'getTime'])->name('getTime');






