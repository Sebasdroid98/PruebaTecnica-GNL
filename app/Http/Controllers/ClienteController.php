<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Registro de un nuevo cliente
     */
    public function store()
    {
        // dd(request()->all());
        $data = request()->validate([
            'identificacion' => ['required', 'string', 'max:15'],
            'nombres' => ['required', 'string', 'max:45'],
            'apellidos' => ['required', 'string', 'max:45'],
            'celular' => ['required', 'string', 'max:15'],
            'correo' => ['required', 'string', 'email', 'max:100'],
            'habeas_data' => ['required', 'boolean'],
            'municipio_id' => ['required', 'numeric']
        ]);

        // Sigue aquí
    }
}
