<?php

namespace App\Console\Commands;

use App\Models\Cliente;
use App\Models\Ganador;
use App\Models\Premio;
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

        $clienteSeleccionado = $usuarios->random();

        // Obtenemos el premio por sortear
        $premio = Premio::where('estado', '0')->first();

        if ($premio) {
            // Actualizamos el estado del premio a '1' (sorteado)
            $premio->estado = '1';
            $premio->save();

            // Asignamos el premio al ganador
            $ganadorObj = new Ganador();
            $ganadorObj->cliente_id = $clienteSeleccionado->id;
            $ganadorObj->premio_id = $premio->id;
            $ganadorObj->save();

            $this->info("El ganador es: {$clienteSeleccionado->name} (ID: {$clienteSeleccionado->id})");
            Log::info("Ganador seleccionado: {$clienteSeleccionado->name} (ID: {$clienteSeleccionado->id})");

        } else {
            $this->info('No hay premios disponibles para sortear.');
            Log::info('No hay premios disponibles para sortear.');
            return;
        }

        // Puedes guardar esta información en la base de datos, enviarla por correo, etc.
        // $this->info("El ganador es: {$ganador->name} (ID: {$ganador->id})");
        // Log::info("Ganador seleccionado: {$ganador->name} (ID: {$ganador->id})");
    }
}
