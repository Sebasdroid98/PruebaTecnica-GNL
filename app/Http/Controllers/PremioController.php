<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PremioRequest;
use App\Models\Premio;
use Illuminate\Http\Request;

class PremioController extends Controller
{
    /**
     * Se registra un nuevo premio.
     * 
     * @param PremioRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registrarPremio(PremioRequest $request)
    {
        Premio::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'cantidad' => $request->cantidad,
            'estado' => false
        ]);

        return back()->with('success', 'Premio creado exitosamente.');
    }
}
