<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class VehiculoSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Vehiculo.csv', 'vehiculos', [
            'Id_Vehiculo' => 'id_vehiculo',
            'Id_Modelo' => 'Id_Modelo',
            'AnioVehiculo' => 'año_vehiculo',
            'Id_Vendedor' => 'Id_Vendedor',
        ]);
    }
}
