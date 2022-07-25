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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->string('nombres',45);
            $table->string('paterno',20);
            $table->string('materno',20);
            $table->integer('ci');
            $table->string('extension');
            $table->string('sexo');
            $table->date('fecnac');
            $table->string('url')->nullable();
            $table->string('perfil',400)->nullable();
            $table->string('habilidad',400)->nullable();
            $table->string('direccion')->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('celular')->nullable();


            $table->unsignedBigInteger('user_id')->unique();

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('personas');
    }
};
