<?php

namespace App\View\Components\inicio;

use App\Models\Departamento;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection as Collection;

class RegistroClientes extends Component
{
    public $departamentos;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->departamentos = $this->obtenerDepartamentos();
    }

    /**
     * Función para obtener el listado de departamentos
     */
    public function obtenerDepartamentos(): Collection
    {
        return Departamento::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inicio.registro-clientes');
    }
}
