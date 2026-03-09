<?php

namespace Database\Seeders;

use Database\Seeders\Concerns\CsvSeeder;
use Illuminate\Database\Seeder;

class VendedorSeeder extends Seeder
{
    use CsvSeeder;

    public function run(): void
    {
        $this->importCsv('Vendedor.csv', 'vendedores', [
            'Id_Vendedor' => 'ID_Vendedor',
            'Nombre' => 'Nombre',
            'Apellido' => 'Apellido',
            'Email' => 'Email',
            'Password' => 'Password',
            'FechaNacimiento' => 'fecha_nacimiento',
            'FotoVendedor' => 'Foto',
            'ID_Sede' => 'Id_Sede',
        ], function (array $row) {
            // Si la contraseña no parece hash, se encripta
            if (!preg_match('/^\$2y\$|^\$argon2/', (string) ($row['Password'] ?? ''))) {
                $row['Password'] = bcrypt($row['Password'] ?? 'secret123');
            }
            return $row;
        });
    }
}
