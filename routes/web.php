<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SintomaController;
use App\Http\Controllers\SignoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TratamientoController;

Route::get('/',  fn() => redirect('dashboard'));

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', fn () => view('dashboard'))
    ->name('dashboard');

Route::resource('users', UserController::class)->middleware('auth:sanctum');

Route::resource('sintomas', SintomaController::class)->middleware('auth:sanctum');

Route::resource('signos', SignoController::class)->middleware('auth:sanctum');

Route::resource('tratamientos', TratamientoController::class)->middleware('auth:sanctum');

Route::resource('pacientes', PacienteController::class)
    ->middleware('auth:sanctum');

Route::patch('citas/{cita}/cambioEstado', [CitaController::class, 'cambioEstado'])
    ->middleware('auth:sanctum')
    ->name('citas.cambio-estado');

Route::resource('pacientes.citas', CitaController::class)
    ->middleware('auth:sanctum')
    ->shallow();

Route::resource('especialidades', EspecialidadController::class)
    ->middleware('auth:sanctum')
    ->except('show')
    ->parameter('especialidades','especialidad');

Route::prefix('medicos')
    ->middleware(['auth:sanctum'])
    ->controller(MedicoController::class)
    ->name('medicos.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::patch('/{user}/update', 'update')->name('update');
    });

