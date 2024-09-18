<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('login', [AuthController::class, 'login']);

Route::get('pacientes', [PacienteController::class, 'index'])->name(name: 'pacientes.index');
Route::get('pacientes/create', [PacienteController::class, 'create'])->name(name: 'pacientes.create');
