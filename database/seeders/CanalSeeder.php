<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class CanalSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Canal.csv', 'canales', [
            'ID_Canal' => 'ID_Canal',
            'TipoCanal' => 'Tipo_Canal',
            'Canal' => 'Canal',
        ]);
    }
}
