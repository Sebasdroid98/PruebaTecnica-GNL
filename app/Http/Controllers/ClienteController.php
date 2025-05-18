<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Registro de un nuevo cliente
     * 
     * @param ClienteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registrarCliente(ClienteRequest $request)
    {
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
