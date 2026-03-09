<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class ModeloVehiculoSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Modelo_Vehiculo.csv', 'modelos_vehiculo', [
            'Id_Modelo' => 'Id_Modelo',
            'Marca_Vehiculo' => 'marca_vehiculo',
            'Nombre_Modelo' => 'Nombre_Modelo',
        ]);
    }
}
