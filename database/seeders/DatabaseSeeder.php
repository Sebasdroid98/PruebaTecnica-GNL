<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Se pueden descomentar las siguientes líneas para crear datos de prueba
        // Cliente::factory(100)->create();

        $this->call([
            DepartamentoSeeder::class,
            MunicipioSeeder::class,
        ]);
    }
}
