<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Cliente.csv', 'clientes', [
            'ID_Cliente' => 'id_Cliente',
            'Nombres' => 'Nombres',
            'ApellidoP' => 'Apellido_P',
            'ApellidoM' => 'Apellido_M',
            'Segmento' => 'Segmento',
            'ID_Canal' => 'Id_Canal',
        ]);
    }
}
