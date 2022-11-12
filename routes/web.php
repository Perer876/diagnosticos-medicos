<?php

use App\Http\Controllers\EspecialidadController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SintomaController;
use App\Http\Controllers\SignoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PruebaLaboratorioController;
use App\Http\Controllers\PruebaPostMortemController;

Route::get('/',  fn() => redirect('dashboard'));

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('users', UserController::class)->middleware('auth:sanctum');

Route::resource('sintomas', SintomaController::class)->middleware('auth:sanctum');

Route::resource('signos', SignoController::class)->middleware('auth:sanctum');

Route::resource('pacientes', PacienteController::class)->middleware('auth:sanctum');

Route::resource('pruebas_laboratorio', PruebaLaboratorioController::class)->middleware('auth:sanctum');

Route::resource('pruebas_post_mortem', PruebaPostMortemController::class)->middleware('auth:sanctum');

Route::resource('especialidades', EspecialidadController::class)->middleware('auth:sanctum')
    ->except('show')->parameter('especialidades','especialidad');

