<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Ganador;
use App\Models\Premio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Obtener todos los clientes
        $clientes = Cliente::select('id', 'identificacion', 'nombres', 'apellidos', 'correo','celular', 'habeas_data','municipio_id')
            ->orderBy('created_at', 'desc')
            ->with('municipio.departamento')
            ->get();

        // Obtener todos los premios
        $premios = Premio::select('id', 'codigo', 'nombre', 'cantidad', 'estado')
            ->orderBy('created_at', 'desc')
            ->get();

        // Obtener los ganadores
        $ganadores = Ganador::select('cliente_id','premio_id')
            ->orderBy('created_at', 'desc')
            ->with('cliente.municipio.departamento')
            ->with('premio')
            ->get();

        // dd($ganadores);

        return view('dashboard', compact('clientes', 'ganadores', 'premios'));
    }
}
