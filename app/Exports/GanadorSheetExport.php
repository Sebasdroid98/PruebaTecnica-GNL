<?php

namespace App\Exports;

use App\Models\Ganador;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class GanadorSheetExport implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view('exports.ganadores', [
            'ganadores' => Ganador::select('cliente_id','premio_id')
            ->with('cliente')
            ->with('premio')
            ->get()
        ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Ganadores';
    }
}
