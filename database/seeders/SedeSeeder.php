<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class SedeSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Sede.csv', 'sedes', [
            'ID_Sede' => 'ID_Sede',
            'NombreSede' => 'Nombre_Sede',
            'Ubicacion_Sede' => 'Ubicación_Sede',
        ]);
    }
}
