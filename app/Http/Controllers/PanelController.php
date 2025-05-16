<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Ganador;
use App\Models\Premio;

class PanelController extends Controller
{
    /**
     * Muestra la interfaz del panel con los datos de clientes, premios y ganadores.
     *
     * @return \Illuminate\View\View
     */
    public function mostrarInterfaz()
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

        return view('panel.panel', compact('clientes', 'ganadores', 'premios'));
    }
}
