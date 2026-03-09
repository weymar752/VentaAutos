<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id('ID_Cliente');
            $table->string('Nombres', 150);
            $table->string('ApellidoP', 120);
            $table->string('ApellidoM', 120)->nullable();
            $table->string('Segmento', 120)->nullable();
            $table->foreignId('ID_Canal')
                ->references('ID_Canal')
                ->on('canales')
                ->restrictOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
