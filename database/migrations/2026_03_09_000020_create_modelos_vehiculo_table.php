<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('modelos_vehiculo', function (Blueprint $table) {
            $table->id('Id_Modelo');
            $table->string('Marca_Vehiculo', 150);
            $table->string('Nombre_Modelo', 150);
            $table->foreign('Nombre_Modelo')
                ->references('Nombre_Modelo')
                ->on('tipos_vehiculo')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modelos_vehiculo');
    }
};
