<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleReciboCondominiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_recibo_condominios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_recibo_condominio');
            $table->unsignedBigInteger('id_proveedor');

            $table->timestamps();

            $table->foreign('id_recibo_condominio')->references('id')->on('recibo_condominios');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_recibo_condominios');
    }
}
