<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultiSheetExport implements WithMultipleSheets
{
    use Exportable;

    public function sheets(): array
    {
        return [
            new ClienteSheetExport(),
            new GanadorSheetExport(),
            new PremioSheetExport(),
        ];
    }
}
