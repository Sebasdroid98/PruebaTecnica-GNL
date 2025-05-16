<?php

namespace App\View\Components\panel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TablaGanadores extends Component
{
    public $ganadores;

    /**
     * Create a new component instance.
     */
    public function __construct($ganadores)
    {
        $this->ganadores = $ganadores;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.tabla-ganadores');
    }
}
