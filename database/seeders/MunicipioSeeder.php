<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * Datos obtenidos de la siguiente fuente:
         * https://github.com/marcovega/colombia-json
         */
        $path = database_path('data/municipios.json');

        if (!File::exists($path)) {
            $this->command->error("El archivo municipios.json no fue encontrado.");
            return;
        }

        $municipios = json_decode(File::get($path), true);

        foreach ($municipios as $municipio) {
            $departamento = DB::table('departamentos')
                ->where('id', $municipio['id'])
                ->first();

            if ($departamento) {
                $ciudades = $municipio['ciudades'];
                foreach ($ciudades as $ciudad) {
                    DB::table('municipios')->insert([
                        'nombre' => $ciudad,
                        'departamento_id' => $departamento->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
