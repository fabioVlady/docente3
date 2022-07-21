<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docente_materia', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('materia_id');
            $table->string('periodo')->nullable();
            $table->date('inicio')->nullable();
            $table->date('fin')->nullable();
            $table->string('dia1')->nullable();
            $table->time('hora_dia1')->nullable();
            $table->string('dia2')->nullable();
            $table->time('hora_dia2')->nullable();
            $table->date('primer_parcial')->nullable();
            $table->date('segundo_parcial')->nullable();
            $table->date('examen_final')->nullable();

            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');

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
        Schema::dropIfExists('docente_materia');
    }
};
