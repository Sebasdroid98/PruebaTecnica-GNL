<?php

namespace App\Http\Controllers;

use App\Exports\MultiSheetExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportarDatosController extends Controller
{
    /**
     * Función para exportar todas las tablas a un archivo xlsx.
     */
    public function exportarBase(){
        return Excel::download(new MultiSheetExport, 'datos-sistema.xlsx');
    }
}
