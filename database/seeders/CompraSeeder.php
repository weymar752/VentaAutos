<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Compra.csv', 'compras', [
            'Id_Compra' => 'Id_Compra',
            'Fecha' => 'Fecha',
            'Costo_Vehiculo' => 'Costo Vehículo',
            'IGV' => 'IGV',
            'ID_Cliente' => 'Id_Cliente',
            'Id_Vehiculo' => 'Id_Vehiculo',
        ], function (array $row, array $raw) {
            // Ignora columna id_Vendedor que no existe en el esquema
            return $row;
        });
    }
}
