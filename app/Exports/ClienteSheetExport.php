<?php

namespace App\Exports;

use App\Models\Cliente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class ClienteSheetExport implements FromView, WithTitle
{
    /**
     * @return \Illuminate\Support\View
     */
    public function view(): View
    {
        return view('exports.clientes', [
            'clientes' => Cliente::select('id', 'identificacion', 'nombres', 'apellidos', 'correo','celular', 'habeas_data','municipio_id')
            ->with('municipio.departamento')
            ->get()
        ]);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Clientes';
    }
}
