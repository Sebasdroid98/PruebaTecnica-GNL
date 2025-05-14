<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Registro de un nuevo cliente
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'identificacion' => ['required', 'string', 'max:15', 'unique:clientes'],
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'celular' => ['required', 'string', 'max:15'],
            'correo' => ['required', 'string', 'email', 'max:100'],
            'habeas_data' => ['required', 'boolean'],
            'municipio_id' => ['required', 'numeric']
        ]);

        $cliente = Cliente::create([
            'identificacion' => $request->identificacion,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'celular' => $request->celular,
            'correo' => $request->correo,
            'habeas_data' => $request->habeas_data,
            'municipio_id' => $request->municipio_id
        ]);

        return redirect('/')->with('success', 'Cliente con CC '.$cliente->identificacion.', registrado con éxito.');

    }
}
