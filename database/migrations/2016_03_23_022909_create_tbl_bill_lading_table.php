<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBillLadingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bill_lading', function (Blueprint $table) {
            $table->increments('id');
            $table->string('consignee');
            $table->string('delivery');
            $table->string('container_no');
            $table->string('package_no');
            $table->string('kind_package_no');
            $table->string('gross_weight');
            $table->string('measurement');
            $table->string('number_original');
            $table->string('place_receipt');
            $table->string('place_issue');
            $table->date('date_laden');
            $table->integer('book_id')->unsigned();
            $table->foreign('book_id')->references('id')->on('tbl_booking_order')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tbl_bill_lading');
    }
}
