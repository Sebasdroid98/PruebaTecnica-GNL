<?php

namespace App\View\Components\panel;

use App\Models\Premio;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class TablaPremios extends Component
{
    public $premios;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->premios = $this->obtenerPremios();
    }

    /*
     * Función para obtener los datos de los premios registrados
     */
    public function obtenerPremios(): LengthAwarePaginator
    {
        return Premio::select('id', 'codigo', 'nombre', 'cantidad', 'estado')
            ->orderBy('created_at', 'desc')
            ->paginate(5);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.tabla-premios');
    }
}
