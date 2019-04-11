<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Artistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Nombre');
            $table->string('Pais');
            $table->string('Tipo');
            $table->string('FechaInicio');
            $table->string('FechaFin');
            $table->timestamps();
        });

        Schema::create('canciones', function (Blueprint $table) {
            $table->increments('Id')->unique();
            $table->string('Nombre');
            $table->string('Artista');
            $table->string('Album');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artistas');
        Schema::dropIfExists('canciones');
    }
}
