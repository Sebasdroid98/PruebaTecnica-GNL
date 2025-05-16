<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiplesHojasExporte implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        return [
            new ClienteExporte,
            new GanadorExporte(),
            new PremioExporte()
        ];
    }
}
