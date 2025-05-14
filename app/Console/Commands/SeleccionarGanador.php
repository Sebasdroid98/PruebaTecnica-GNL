<?php

namespace App\Console\Commands;

use App\Models\Cliente;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SeleccionarGanador extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sorteo:seleccionar-ganador';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Selecciona un ganador al azar si hay al menos 5 usuarios';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $usuarios = Cliente::all();

        if ($usuarios->count() < 5) {
            $this->info('No hay suficientes usuarios para realizar el sorteo.');
            return;
        }

        $ganador = $usuarios->random();

        // Puedes guardar esta información en la base de datos, enviarla por correo, etc.
        // $this->info("El ganador es: {$ganador->name} (ID: {$ganador->id})");
        Log::info("Ganador seleccionado: {$ganador->name} (ID: {$ganador->id})");
    }
}
