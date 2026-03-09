<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id('Id_Vendedor');
            $table->string('Nombre', 120);
            $table->string('Apellido', 150);
            $table->string('Email', 150)->unique();
            $table->string('Password', 255);
            $table->date('FechaNacimiento')->nullable();
            $table->string('FotoVendedor', 255)->nullable();
            $table->foreignId('ID_Sede')
                ->references('ID_Sede')
                ->on('sedes')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
