<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->foreignId('puesto_id')->constrained()->onDelete('cascade'); // FK a puestos
            $table->foreignId('horario_id')->constrained()->onDelete('cascade'); // FK a horarios
            $table->time('hora_inicio_extra')->nullable();
            $table->time('hora_fin_extra')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}

