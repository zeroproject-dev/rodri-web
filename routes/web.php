<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctoresController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SesionesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('pacientes', [PacienteController::class, 'index'])
    ->name('pacientes.index')
    ->middleware(['auth', 'verified']);
Route::get('pacientes/create', [PacienteController::class, 'create'])
    ->name('pacientes.create')
    ->middleware(['auth', 'verified']);
Route::post('pacientes', [PacienteController::class, 'store'])
    ->name('pacientes.store')
    ->middleware(['auth', 'verified']);
Route::get('pacientes/{paciente}/edit', [PacienteController::class, 'edit'])
    ->name('pacientes.edit')
    ->middleware(['auth', 'verified']);
Route::put('pacientes/{paciente}', [PacienteController::class, 'update'])
    ->name('pacientes.update')
    ->middleware(['auth', 'verified']);
Route::patch('pacientes/{paciente}/toggle', [PacienteController::class, 'toggle'])
    ->name('pacientes.toggle')
    ->middleware(['auth', 'verified']);
// Route::delete('pacientes/{paciente}', [PacienteController::class, 'destroy'])
//     ->name('pacientes.destroy')
//     ->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('sesiones', [SesionesController::class, 'index'])
        ->name('sesiones.index');

    Route::get('sesiones/create', [SesionesController::class, 'create'])
        ->name('sesiones.create');

    Route::post('sesiones', [SesionesController::class, 'store'])
        ->name('sesiones.store');

    Route::get('sesiones/{sesion}/edit', [SesionesController::class, 'edit'])
        ->name('sesiones.edit');

    Route::put('sesiones/{sesion}', [SesionesController::class, 'update'])
        ->name('sesiones.update');
});

Route::get('doctores', [DoctoresController::class, 'index'])
    ->name('doctores.index')
    ->middleware(['auth', 'verified']);

Route::get('doctores/create', [DoctoresController::class, 'create'])
    ->name('doctores.create')
    ->middleware(['auth', 'verified']);

Route::post('doctores', [DoctoresController::class, 'store'])
    ->name('doctores.store')
    ->middleware(['auth', 'verified']);

Route::get('doctores/{user}/edit', [DoctoresController::class, 'edit'])
    ->name('doctores.edit')
    ->middleware(['auth', 'verified']);

Route::put('doctores/{user}', [DoctoresController::class, 'update'])
    ->name('doctores.update')
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('pacientes', PacienteController::class)
//     ->only('index', 'create', 'store', 'update', 'edit')
//     ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
