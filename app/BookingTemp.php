<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingTemp extends Model
{
    protected $table = 'tbl_booking_temp';

    protected $fillable = ['id','book_id','user_id','time','date_created'];

    public $timestamps = false;


}