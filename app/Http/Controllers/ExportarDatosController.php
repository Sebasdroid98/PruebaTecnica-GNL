<?php

namespace App\Http\Controllers;

use App\Exports\MultiplesHojasExporte;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExportarDatosController extends Controller
{
    /**
     * Función para exportar todas las tablas a un archivo xlsx.
     */
    public function exportarBase(){
        return Excel::download(new MultiplesHojasExporte, 'datos-sistema.xlsx');
    }
}
