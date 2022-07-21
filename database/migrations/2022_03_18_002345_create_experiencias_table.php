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
        Schema::create('experiencias', function (Blueprint $table) {
            $table->id();

            $table->string('nombre_empresa',45);
            $table->string('tipo_institucion',45);
            $table->string('cargo',45);
            $table->text('funciones');
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
        Schema::dropIfExists('experiencias');
    }
};
