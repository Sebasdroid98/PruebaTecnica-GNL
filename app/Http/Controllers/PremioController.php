<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PremioController extends Controller
{
    /**
     * Se registra un nuevo premio.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => ['required', 'string', 'max:10'],
            'nombre' => ['required', 'string', 'max:100'],
            'cantidad' => 'required|numeric'
        ]);

        \App\Models\Premio::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'estado' => false
        ]);

        return back()->with('success', 'Premio creado exitosamente.');
    }
}
