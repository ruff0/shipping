<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company');
            $table->string('job_descriptions');
            $table->string('contact_name');
            $table->string('address');
            $table->string('city');
            $table->integer('zip_code');
            $table->string('phone');
            $table->string('EIN');
            $table->string('fax');                        
            $table->string('IAddress');
            $table->string('ACL_ID');
            $table->string('logo');
            $table->string('notes');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('state')->onDelete('cascade');
             $table->integer('customer_type_id')->unsigned();
            $table->foreign('customer_type_id')->references('id')->on('customer_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}