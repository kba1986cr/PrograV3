<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiemposExtrasTable extends Migration
{
    public function up()
    {
        Schema::create('tiempos_extras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')->constrained()->onDelete('cascade'); // FK a eventos
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tiempos_extras');
    }
}
