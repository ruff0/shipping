<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsertypePerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('tbl_usertype_per', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('per_id')->unsigned();
            $table->foreign('per_id')->references('id')->on('tbl_permission')->onDelete('cascade');
            $table->integer('usertype_id')->unsigned();
            $table->foreign('usertype_id')->references('id')->on('tbl_user_types')->onDelete('cascade');
        });   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_usertype_per');
    }
}
