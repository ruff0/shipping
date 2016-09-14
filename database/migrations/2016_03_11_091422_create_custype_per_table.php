<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustypePerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custype_per', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('per_id')->unsigned();
            $table->foreign('per_id')->references('id')->on('permission')->onDelete('cascade');
            $table->integer('custype_id')->unsigned();
            $table->foreign('custype_id')->references('id')->on('customer_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('custype_per');
    }
}
