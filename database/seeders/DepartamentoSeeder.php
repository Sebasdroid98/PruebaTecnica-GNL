<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            ['id' => 1,'codigo_dane' => '91', 'nombre' => 'Amazonas'],
            ['id' => 2,'codigo_dane' => '05', 'nombre' => 'Antioquia'],
            ['id' => 3,'codigo_dane' => '81', 'nombre' => 'Arauca'],
            ['id' => 4,'codigo_dane' => '08', 'nombre' => 'Atlántico'],
            ['id' => 5,'codigo_dane' => '13', 'nombre' => 'Bolívar'],
            ['id' => 6,'codigo_dane' => '15', 'nombre' => 'Boyacá'],
            ['id' => 7,'codigo_dane' => '17', 'nombre' => 'Caldas'],
            ['id' => 8,'codigo_dane' => '18', 'nombre' => 'Caquetá'],
            ['id' => 9,'codigo_dane' => '85', 'nombre' => 'Casanare'],
            ['id' => 10,'codigo_dane' => '19', 'nombre' => 'Cauca'],
            ['id' => 11,'codigo_dane' => '20', 'nombre' => 'Cesar'],
            ['id' => 12,'codigo_dane' => '27', 'nombre' => 'Chocó'],
            ['id' => 13,'codigo_dane' => '25', 'nombre' => 'Cundinamarca'],
            ['id' => 14,'codigo_dane' => '23', 'nombre' => 'Córdoba'],
            ['id' => 15,'codigo_dane' => '94', 'nombre' => 'Guainía'],
            ['id' => 16,'codigo_dane' => '95', 'nombre' => 'Guaviare'],
            ['id' => 17,'codigo_dane' => '41', 'nombre' => 'Huila'],
            ['id' => 18,'codigo_dane' => '44', 'nombre' => 'La Guajira'],
            ['id' => 19,'codigo_dane' => '47', 'nombre' => 'Magdalena'],
            ['id' => 20,'codigo_dane' => '50', 'nombre' => 'Meta'],
            ['id' => 21,'codigo_dane' => '52', 'nombre' => 'Nariño'],
            ['id' => 22,'codigo_dane' => '54', 'nombre' => 'Norte de Santander'],
            ['id' => 23,'codigo_dane' => '86', 'nombre' => 'Putumayo'],
            ['id' => 24,'codigo_dane' => '63', 'nombre' => 'Quindío'],
            ['id' => 25,'codigo_dane' => '66', 'nombre' => 'Risaralda'],
            ['id' => 26,'codigo_dane' => '88', 'nombre' => 'San Andrés y Providencia'],
            ['id' => 27,'codigo_dane' => '68', 'nombre' => 'Santander'],
            ['id' => 28,'codigo_dane' => '70', 'nombre' => 'Sucre'],
            ['id' => 29,'codigo_dane' => '73', 'nombre' => 'Tolima'],
            ['id' => 30,'codigo_dane' => '76', 'nombre' => 'Valle del Cauca'],
            ['id' => 31,'codigo_dane' => '97', 'nombre' => 'Vaupés'],
            ['id' => 32,'codigo_dane' => '99', 'nombre' => 'Vichada']
        ];

        foreach ($departamentos as $dep) {
            DB::table('departamentos')->insert([
                'id' => $dep['id'],
                'codigo' => $dep['codigo_dane'],
                'nombre' => $dep['nombre'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
