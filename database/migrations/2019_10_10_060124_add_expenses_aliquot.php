<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpensesAliquot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aliquot', function (Blueprint $table) {
            $table->foreign('id_expenses')->references('id')->on('expenses');
            $table->foreign('id_estate')->references('id')->on('estate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('estate', function (Blueprint $table) {
            $table->dropColumn('id_expenses');
            $table->dropColumn('id_estate');
        });
        
    }
}
