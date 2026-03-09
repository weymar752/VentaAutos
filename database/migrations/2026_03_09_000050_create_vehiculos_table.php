<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id('Id_Vehiculo');
            $table->unsignedSmallInteger('AnioVehiculo');
            $table->foreignId('Id_Modelo')
                ->references('Id_Modelo')
                ->on('modelos_vehiculo')
                ->restrictOnDelete();
            $table->foreignId('Id_Vendedor')
                ->references('Id_Vendedor')
                ->on('vendedores')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
