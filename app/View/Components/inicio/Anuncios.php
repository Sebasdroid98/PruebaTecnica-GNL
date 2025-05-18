<?php

namespace App\View\Components\inicio;

use App\Models\Premio;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Anuncios extends Component
{
    public $premio;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->premio = $this->obtenerPremio();
    }

    /**
     * Función para obtener el próximo premio por sortear
     */
    public function obtenerPremio(): ?Premio
    {
        return Premio::select('id', 'codigo', 'nombre', 'cantidad')
            ->where('estado', '0')->first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.inicio.anuncios');
    }
}
