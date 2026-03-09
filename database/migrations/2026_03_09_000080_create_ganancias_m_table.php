<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ganancias_m', function (Blueprint $table) {
            $table->id('Id_Informe_Ganancia');
            $table->decimal('PPTO', 12, 2);
            $table->string('Periodo', 50);
            $table->unsignedTinyInteger('Mes');
            $table->foreignId('ID_Sede')
                ->references('ID_Sede')
                ->on('sedes')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ganancias_m');
    }
};
