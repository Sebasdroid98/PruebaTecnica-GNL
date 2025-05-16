<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Ganador;
use App\Models\Premio;

class InvitadoController extends Controller
{
    /**
     * Muestra la interfaz del invitado con los datos de departamentos, premios y ganadores.
     * 
     * @return \Illuminate\View\View
     */
    public function mostrarInterfaz()
    {
        $departamentos = Departamento::all();
        $ganadores = Ganador::select('cliente_id','premio_id')
                ->orderBy('created_at', 'desc')
                ->with('cliente.municipio.departamento')
                ->with('premio')
                ->get();

        // Obtener los premios disponibles
        $premio = Premio::select('id', 'codigo', 'nombre', 'cantidad')
                ->where('estado', '0')->first();
        
        return view('inicio', compact('departamentos','ganadores','premio'));
    }
}
