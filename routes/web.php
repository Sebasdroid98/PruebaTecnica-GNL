<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ExportarDatosController;
use App\Http\Controllers\GanadorController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'inicio')->name('inicio');

Route::view('/panel', 'panel')->middleware(['auth', 'verified'])->name('panel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para registrar un nuevo premio
    Route::post('registrar-premio', [PremioController::class, 'registrarPremio'])->name('registrar.premio');

    // Ruta para seleccionar un ganador al azar
    Route::get('seleccionar-ganador', [GanadorController::class, 'seleccionarGanador'])->name('seleccionar.ganador');

    // Ruta para exportar todos los datos a Excel
    Route::get('exportar-registros', [ExportarDatosController::class, 'exportarBase'])->name('exportar.registros');
});

Route::middleware('guest')->group(function () {
    // Ruta para consultar los municipios de un departamento
    Route::get('municipios/{id}', [MunicipioController::class, 'obtenerMunicipiosDepto'])->name('municipios.depto');

    // Ruta para registrar un nuevo cliente
    Route::post('registrar-cliente', [ClienteController::class, 'registrarCliente'])->name('registrar.cliente');
});

require __DIR__.'/auth.php';
