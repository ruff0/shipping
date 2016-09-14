<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblArrivalNoticeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_arrival_notice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mode');
            $table->string('PU_no');
            $table->string('container_no');
            $table->string('shipping_line');
            $table->string('master_BL');
            $table->string('AMS_BL');
            $table->string('House_BL');
            $table->string('Final_ETA');
            $table->integer('IT_no');
            $table->date('date_it_issued');
            $table->date('last_free_date');
            $table->date('GO_date');
            $table->string('cargo_location');
            $table->string('remit_payment');
            $table->float('freight_collect');   
            $table->float('handling_fee');
            $table->float('ams_fee');
            $table->float('ddc');
            $table->float('demurrage');
            $table->float('inland_freight');
            $table->float('custom_clearance');
            $table->float('custom_duty');
            $table->float('custom_bond');
            $table->float('examination_fee');
            $table->float('cfs_charges');
            $table->float('thc_fee');
            $table->float('origin_charges');
            $table->float('chassis_charges');
            $table->float('pier_pass_charges');
            $table->float('IT_entry_charges');
            $table->float('amount_due');
            $table->float('prepare_by');
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
        Schema::drop('tbl_arrival_notice');
    }
}
