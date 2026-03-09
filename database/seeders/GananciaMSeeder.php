<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class GananciaMSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $meses = [
            'enero' => 1, 'febrero' => 2, 'marzo' => 3, 'abril' => 4,
            'mayo' => 5, 'junio' => 6, 'julio' => 7, 'agosto' => 8,
            'septiembre' => 9, 'octubre' => 10, 'noviembre' => 11, 'diciembre' => 12,
        ];

        $this->importCsv('Ganancias_Mensuales.csv', 'ganancias_m', [
            'Id_Informe_Ganancia' => 'Id_Ganancias',
            'PPTO' => 'ppto',
            'Periodo' => 'periodo',
            'Mes' => 'mes',
            'ID_Sede' => 'id_sede',
        ], function (array $row, array $raw) use ($meses) {
            $mes = strtolower(trim((string) ($raw['mes'] ?? '')));
            $row['Mes'] = $meses[$mes] ?? null;
            return $row;
        });
    }
}
