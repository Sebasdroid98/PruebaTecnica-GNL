<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExportarDatosController;
use App\Http\Controllers\GanadorController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\ProfileController;
use App\Models\Ganador;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $departamentos = \App\Models\Departamento::all();
    $ganadores = Ganador::select('cliente_id','premio_id')
            ->orderBy('created_at', 'desc')
            ->with('cliente.municipio.departamento')
            ->with('premio')
            ->get();
    return view('welcome', compact('departamentos','ganadores'));
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para registrar un nuevo premio
    Route::post('register-premio', [PremioController::class, 'store'])->name('register.premio');

    // Ruta para seleccionar un ganador al azar
    Route::get('seleccionar-ganador', [GanadorController::class, 'seleccionarGanador'])->name('seleccionar.ganador');

    // Ruta para exportar todos los datos a Excel
    Route::get('exportar-registros', [ExportarDatosController::class, 'exportarBase'])->name('exportar.registros');
});

Route::middleware('guest')->group(function () {
    // Ruta para consultar los municipios de un departamento
    Route::get('municipios/{id}', [MunicipioController::class, 'getMunicipios'])->name('municipios_depto');
    
    // Ruta para registrar un nuevo cliente
    Route::post('register-cliente', [ClienteController::class, 'store'])->name('register.cliente');
});

require __DIR__.'/auth.php';
