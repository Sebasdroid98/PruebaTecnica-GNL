<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Ganador;
use App\Models\Premio;

class GanadorController extends Controller
{
    /**
     * Seleccionar ganador al azar si hay al menos 5 usuarios.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function seleccionarGanador(){
        $usuarios = Cliente::all();

        if ($usuarios->count() < 5) {
            return back()->with('info', 'No hay suficientes usuarios para realizar el sorteo.');
        }

        $clienteSeleccionado = $usuarios->random();

        // Obtenemos el premio por sortear
        $premio = Premio::where('estado', '0')->first();

        if ($premio) {
            // Actualizamos el estado del premio a '1' (sorteado)
            $premio->estado = '1';
            $premio->save();

            // Asignamos el premio al ganador
            $ganadorObj = new Ganador();
            $ganadorObj->cliente_id = $clienteSeleccionado->id;
            $ganadorObj->premio_id = $premio->id;
            $ganadorObj->save();

            return back()->with('success', "El ganador es: {$clienteSeleccionado->name} (ID: {$clienteSeleccionado->id})");

        } else {
            return back()->with('info', 'No hay premios disponibles para sortear.');
        }
    }
}
