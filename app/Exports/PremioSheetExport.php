<?php

namespace App\Exports;

use App\Models\Premio;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class PremioSheetExport implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view('exports.premios', [
            'premios' => Premio::all()
        ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Premios';
    }
}
