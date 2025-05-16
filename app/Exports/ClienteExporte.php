<?php

namespace App\Exports;

use App\Models\Cliente;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class ClienteExporte implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Cliente::select('id', 'identificacion', 'nombres', 'apellidos', 'correo','celular', 'habeas_data','municipio_id')
            ->with('municipio.departamento')
            ->get();
    }

    /**
     * Se configura el encabezado del archivo Excel
     * @return array
     */
    public function headings(): array
    {
        return ['Identificación', 'Nombres', 'Apellidos', 'Celular', 'Correo', 'Municipio', 'Departamento', 'Tratamiento de datos'];
    }

    /**
     * Se configura el mapeo de los datos a exportar
     * @param $cliente
     * @return array
     */
    public function map($cliente): array
    {
        return [
            $cliente->identificacion,
            $cliente->nombres,
            $cliente->apellidos,
            $cliente->celular,
            $cliente->correo,
            $cliente->municipio->nombre,
            $cliente->municipio->departamento->nombre,
            $cliente->habeas_data ? 'Aceptado' : 'No aceptado'
        ];
    }

    /**
     * Se configura el título de la hoja de Excel
     * @return string
     */
    public function title(): string
    {
        return 'Clientes';
    }
}
