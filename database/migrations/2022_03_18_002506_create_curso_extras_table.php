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
        Schema::create('curso_extras', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_curso',50);
            $table->string('institucion',50);
            $table->integer('horas');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');

            $table->unsignedBigInteger('persona_id');

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

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
        Schema::dropIfExists('curso_extras');
    }
};
