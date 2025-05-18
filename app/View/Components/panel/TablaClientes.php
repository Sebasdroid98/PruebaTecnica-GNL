<?php

namespace App\View\Components\panel;

use App\Models\Cliente;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class TablaClientes extends Component
{
    public $clientes;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->clientes = $this->obtenerClientes();
    }

    /*
     * Función para obtener los clientes registrados
     */
    public function obtenerClientes(): LengthAwarePaginator
    {
        return Cliente::select('id', 'identificacion', 'nombres', 'apellidos', 'correo','celular', 'habeas_data','municipio_id')
            ->orderBy('created_at', 'desc')
            ->with('municipio.departamento')
            ->paginate(15);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.tabla-clientes');
    }
}
