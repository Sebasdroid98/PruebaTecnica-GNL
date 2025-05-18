<?php

namespace App\View\Components\panel;

use App\Models\Ganador;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class TablaGanadores extends Component
{
    public $ganadores;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->ganadores = $this->obtenerGanadores();
    }

    /*
     * Función para obtener los datos de los ganadores registrados
     */
    public function obtenerGanadores(): LengthAwarePaginator
    {
        return Ganador::select('cliente_id','premio_id')
            ->orderBy('created_at', 'desc')
            ->with('cliente.municipio.departamento', 'premio')
            ->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.tabla-ganadores');
    }
}
