<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CanalSeeder::class,
            TipoVehiculoSeeder::class,
            ModeloVehiculoSeeder::class,
            SedeSeeder::class,
            VendedorSeeder::class,
            VehiculoSeeder::class,
            ClienteSeeder::class,
            CompraSeeder::class,
            GananciaMSeeder::class,
        ]);
    }
}
