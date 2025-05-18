<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Http\Controllers\Controller;

class MunicipioController extends Controller
{
    /**
     * Obtener los municipios de un departamento
     * 
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function obtenerMunicipiosDepto($id)
    {
        $municipios = Municipio::where('departamento_id', $id)
            ->with('departamento:id,nombre')
            ->get();
        return response()->json($municipios);
    }
}
