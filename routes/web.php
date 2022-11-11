<?php

use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SintomaController;
use App\Http\Controllers\SignoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;

Route::get('/',  fn() => redirect('dashboard'));

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('users', UserController::class)->middleware('auth:sanctum');

Route::resource('sintomas', SintomaController::class)->middleware('auth:sanctum');

Route::resource('signos', SignoController::class)->middleware('auth:sanctum');

Route::resource('pacientes', PacienteController::class)->middleware('auth:sanctum');

Route::resource('especialidades', EspecialidadController::class)->middleware('auth:sanctum')
    ->except('show')->parameter('especialidades','especialidad');

Route::prefix('medicos')->controller(MedicoController::class)->middleware(['auth:sanctum'])
    ->name('medicos.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{user}/edit', 'edit')->name('edit');
        Route::patch('/{user}/update', 'update')->name('update');
    });

