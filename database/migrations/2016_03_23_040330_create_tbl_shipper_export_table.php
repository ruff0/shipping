<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShipperExportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shipper_export', function (Blueprint $table) {
            $table->increments('id');
            $table->string('exporter');
            $table->string('export_ref');
            $table->string('method_trans');
            $table->string('country_des');
            $table->string('date_export');
            $table->string('parties_trans');
            $table->string('domestic_routing');
            $table->string('export_carrier');
            $table->string('type_move');
            $table->string('value'); 
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('tbl_booking_order')->onDelete('cascade'); 
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_shipper_export');
    }
}
