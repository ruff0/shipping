<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblBookingOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_booking_order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('booking_no');
            $table->string('BL_no');
            $table->string('log_no');                
            $table->string('export_ref');
            $table->date('today');
            $table->string('bookedby');
            $table->string('shipper');
            $table->string('port_cargo');
            $table->string('port_discharge');
            $table->string('carrier');
            $table->string('final_dest');
            $table->string('vessel');
            $table->string('voyage');                        
            $table->date('rail_cut_off');
            $table->date('ETD');
            $table->date('port_cut_off');
            $table->date('ETA'); 
            $table->string('empty_equip_pu_at'); 
            $table->string('full_load_return_to');
            $table->string('trucking_company');
            $table->string('number_container');
            $table->string('commodities');
            $table->string('remark');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('tbl_users')->onDelete('cascade');           
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
        Schema::drop('tbl_booking_order');
    }
}
