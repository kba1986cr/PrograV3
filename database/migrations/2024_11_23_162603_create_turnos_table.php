<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('turnos', function (Blueprint $table) {
        //     $table->id();
        //     $table->date('dia');
        //     $table->string('turno');
        //     $table->time('hora_inicio')->nullable();
        //     $table->time('hora_fin')->nullable();
        //     $table->text('nota')->nullable();
        //     $table->timestamps();
        // });
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha'); // Fecha específica
            $table->string('turno'); // Nombre del turno
            $table->time('hora_inicio')->nullable(); // Hora de inicio
            $table->time('hora_fin')->nullable(); // Hora de fin
            $table->text('nota')->nullable(); // Notas del turno
            $table->timestamps(); // Tiempos de creación y actualización
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('turnos');
    }
};
