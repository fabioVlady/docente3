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
        Schema::create('curso__idiomas', function (Blueprint $table) {
            $table->id();

            $table->string('idioma',50);
            $table->enum('lectura',[1,2,3,4,5])->default(1);
            $table->enum('escritura',[1,2,3,4,5])->default(1);
            $table->enum('comprension',[1,2,3,4,5])->default(1);
            $table->enum('conversacion',[1,2,3,4,5])->default(1);
            $table->string('nombre_instituto',100);
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
        Schema::dropIfExists('curso__idiomas');
    }
};
