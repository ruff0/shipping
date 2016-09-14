<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();            
            $table->string('company');
            $table->string('job_descriptions');
            $table->string('contact_name');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->integer('zip_code');
            $table->string('phone');
            $table->string('EIN');
            $table->string('fax');                        
            $table->string('IAddress');
            $table->string('ACL_ID');
            $table->string('logo');
            $table->string('notes');            
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('tbl_states')->onDelete('cascade');
            $table->integer('user_type_id')->unsigned();
            $table->foreign('user_type_id')->references('usertype_id')->on('tbl_usertype_per')->onDelete('cascade');            
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
        Schema::drop('user_types');
    }
}
