<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id('Id_Compra');
            $table->date('Fecha');
            $table->decimal('Costo_Vehiculo', 12, 2);
            $table->decimal('IGV', 5, 2);
            $table->foreignId('ID_Cliente')
                ->references('ID_Cliente')
                ->on('clientes')
                ->restrictOnDelete();
            $table->foreignId('Id_Vehiculo')
                ->references('Id_Vehiculo')
                ->on('vehiculos')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
