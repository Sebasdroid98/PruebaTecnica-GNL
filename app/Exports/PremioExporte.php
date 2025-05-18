<?php

namespace App\Exports;

use App\Models\Premio;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;

class PremioExporte implements FromCollection, WithHeadings, WithMapping, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Premio::all();
    }

    /**
     * Se configura el encabezado del archivo Excel
     * @return array
     */
    public function headings(): array
    {
        return ['Código', 'Nombre', 'Cantidad', 'Estado'];
    }

    /**
     * Se configura el mapeo de los datos a exportar
     * @param $premio
     * @return array
     */
    public function map($premio): array
    {
        return [
            $premio->codigo,
            $premio->nombre,
            $premio->cantidad,
            $premio->estado ? 'Sorteado' : 'No sorteado'
        ];
    }

    /**
     * Se configura el título de la hoja de Excel
     * @return string
     */
    public function title(): string
    {
        return 'Premios';
    }
}
