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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'registro',
    'verified',
])->group(function () {
    Route::get('/panel', function () {
        return Inertia::render('Dashboard');
    })->name('panel');
});

Route::middleware(['guest'])->controller(GoogleController::class)->group(function () {
    Route::get('/google/redirect', 'redirect')->name('google');
    Route::get('/google/callback', 'callback');
});

Route::middleware('auth')->controller(CompletarRegistro::class)->group(function () {
    Route::get('/completar-registro', 'create')->name('completar.registro');
    Route::post('/completar-registro', 'store');
});

Route::middleware('auth')->controller(PersonasController::class)->group(function () {
    Route::get('/cargar-registro', 'create')->name('cargar.registro');
    Route::post('/cargar-registro', 'importarExcel');
});

Route::middleware('auth')->controller(InscripcionController::class)->group(function () {
    Route::get('/inscripcion', 'incripcion')->name('incripcion');
});
