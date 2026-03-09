<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class TipoVehiculoSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Tipo_Vehiculo.csv', 'tipos_vehiculo', [
            'Nombre_Modelo' => 'Nombre_Modelo',
            'Tipo_de_Vehiculo' => 'Tipo_Vehiculo2',
        ]);
    }
}
