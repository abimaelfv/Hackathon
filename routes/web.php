<?php

use App\Actions\Fortify\CompletarRegistro;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\PersonasController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Bienvenido', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['guest'])->controller(GoogleController::class)->group(function () {
    Route::get('/google/redirect', 'redirect')->name('google');
    Route::get('/google/callback', 'callback');
});

Route::middleware('auth')->controller(CompletarRegistro::class)->group(function () {
    Route::get('/completar-registro', 'create')->name('completar.registro');
    Route::post('/completar-registro', 'store');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'registro',
    'verified',
])->group(function () {
    Route::get('/panel', function () {
        return Inertia::render('Dashboard');
    })->name('panel');

    Route::controller(PersonasController::class)->group(function () {
        Route::get('/cargar-registro', 'create')->name('cargar.registro');
        Route::post('/cargar-registro', 'importarExcel');
        Route::get('/personas/buscar/{codigo}', 'buscar')->name('personas.buscar');
    });

    Route::controller(InscripcionController::class)->group(function () {
        Route::get('/inscripcion', 'incripcion')->name('incripcion');
        Route::post('/agregar-miembro', 'addMiembro')->name('agregar.miembro');
        Route::delete('/eliminar-miembro/{id}', 'deleteMiembro')->name('eliminar.miembro');
        Route::post('/actualizar-inscripcion', 'upInscripcion')->name('actualizar.incripcion');
        Route::get('/validar-inscripcion/{ins_id}', 'validar')->name('validar.incripcion');
        Route::post('/confirmar-inscripcion/{ins_id}', 'confirmar')->name('confirmar.incripcion');
    });
});
