<?php

namespace App\View\Components\panel;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TablaPremios extends Component
{
    public $premios;
    /**
     * Create a new component instance.
     */
    public function __construct($premios)
    {
        $this->premios = $premios;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.panel.tabla-premios');
    }
}
