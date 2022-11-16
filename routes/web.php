<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CitaController;
use App\Http\Controllers\EnfermedadController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\SintomaController;
use App\Http\Controllers\SignoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PruebaLaboratorioController;
use App\Http\Controllers\PruebaPostMortemController;
use App\Http\Controllers\TratamientoController;

Route::get('/',  fn() => redirect('dashboard'));

Route::middleware(['auth:sanctum', 'verified'])
    ->get('/dashboard', fn () => view('dashboard'))
    ->name('dashboard');


Route::get('enfermedades/{enfermedade}/editTratamiento', [EnfermedadController::class, 'editTratamiento'])
    ->middleware('auth:sanctum')
    ->name('enfermedades.edit-tratamiento');

Route::patch('enfermedades/{enfermedade}/updateTratamiento', [EnfermedadController::class, 'updateTratamiento'])
->middleware('auth:sanctum')
->name('enfermedades.update-tratamiento');

Route::get('enfermedades/{enfermedade}/editSigno', [EnfermedadController::class, 'editSigno'])
    ->middleware('auth:sanctum')
    ->name('enfermedades.edit-signo');

Route::patch('enfermedades/{enfermedade}/updateSigno', [EnfermedadController::class, 'updateSigno'])
->middleware('auth:sanctum')
->name('enfermedades.update-signo');

Route::get('enfermedades/{enfermedade}/editSintoma', [EnfermedadController::class, 'editSintoma'])
    ->middleware('auth:sanctum')
    ->name('enfermedades.edit-sintoma');

Route::patch('enfermedades/{enfermedade}/updateSintoma', [EnfermedadController::class, 'updateSintoma'])
->middleware('auth:sanctum')
->name('enfermedades.update-sintoma');

Route::resource('enfermedades', EnfermedadController::class)->middleware('auth:sanctum');

Route::resource('users', UserController::class)->middleware('auth:sanctum');

Route::resource('sintomas', SintomaController::class)->middleware('auth:sanctum');

Route::resource('signos', SignoController::class)->middleware('auth:sanctum');

Route::resource('pacientes', PacienteController::class)->middleware('auth:sanctum');

Route::resource('pruebas_laboratorio', PruebaLaboratorioController::class)->middleware('auth:sanctum');

Route::resource('pruebas_post_mortem', PruebaPostMortemController::class)->middleware('auth:sanctum');

Route::resource('especialidades', EspecialidadController::class)->middleware('auth:sanctum')
    ->except('show')->parameter('especialidades','especialidad');

Route::resource('tratamientos', TratamientoController::class)->middleware('auth:sanctum');

Route::resource('pacientes', PacienteController::class)
    ->middleware('auth:sanctum');

Route::get('citas', [CitaController::class, 'index'])
    ->middleware('auth:sanctum')
    ->name('citas.index');

Route::patch('citas/{cita}/cambioEstado', [CitaController::class, 'cambioEstado'])
    ->middleware('auth:sanctum')
    ->name('citas.cambio-estado');

Route::resource('pacientes.citas', CitaController::class)
    ->except('index')
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

