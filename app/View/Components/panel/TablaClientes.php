<?php

namespace App\View\Components\panel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TablaClientes extends Component
{
    public $clientes;

    /**
     * Create a new component instance.
     */
    public function __construct($clientes)
    {
        $this->clientes = $clientes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.tabla-clientes');
    }
}
