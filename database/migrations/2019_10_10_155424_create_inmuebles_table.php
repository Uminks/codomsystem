<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('nombre');
            $table->unsignedBigInteger('id_tipo_inmueble');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_condominio');

            $table->timestamps();

            $table->foreign('id_tipo_inmueble')->references('id')->on('tipo_inmuebles');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_condominio')->references('id')->on('condominios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inmuebles');
    }
}
