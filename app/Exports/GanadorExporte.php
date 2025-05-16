<?php

namespace App\Exports;

use App\Models\Ganador;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class GanadorExporte implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ganador::select('cliente_id','premio_id')
            ->with('cliente','premio')
            ->get();
    }

    /**
     * Se configura el encabezado del archivo Excel
     * @return array
     */
    public function headings(): array
    {
        return ['Identificación', 'Nombres', 'Apellidos', 'Celular', 'Correo', 'Código premio', 'Nombre premio', 'Cantidad premio', 'Estado premio'];
    }

    /**
     * Se configura el mapeo de los datos a exportar
     * @param $ganador
     * @return array
     */
    public function map($ganador): array
    {
        return [
            $ganador->cliente->identificacion,
            $ganador->cliente->nombres,
            $ganador->cliente->apellidos,
            $ganador->cliente->celular,
            $ganador->cliente->correo,
            $ganador->premio->codigo,
            $ganador->premio->nombre,
            $ganador->premio->cantidad,
            $ganador->premio->estado ? 'Ganado' : 'No ganado'
        ];
    }

    /**
     * Se configura el título de la hoja de Excel
     * @return string
     */
    public function title(): string
    {
        return 'Ganadores';
    }
}
