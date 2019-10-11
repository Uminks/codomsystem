<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_gastos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_gasto');
            $table->foreign('id_gasto')->references('id')->on('gastos');
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor')->references('id')->on('proveedors');
            $table->float('monto');
            $table->unsignedBigInteger('id_tipo_gasto');
            $table->foreign('id_tipo_gasto')->references('id')->on('tipo_gastos');
            $table->boolean('status');
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
        Schema::dropIfExists('item_gastos');
    }
}
