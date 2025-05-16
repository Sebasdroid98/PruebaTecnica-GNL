<?php

namespace App\View\Components\inicio;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Anuncios extends Component
{
    public $premio;

    /**
     * Create a new component instance.
     */
    public function __construct($premio)
    {
        $this->premio = $premio;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inicio.anuncios');
    }
}
