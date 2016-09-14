<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingOrder extends Model
{
    protected $table = 'tbl_booking_order';

    protected $fillable = ['booking_no','BL_no','log_no','export_no','today','bookedby','shipper','port_cargo','port_discharge','carrier','final_dest','vessel','voyage','rail_cut_off','ETD','port_cut_off','ETA','empty_equip_pu_at','full_load_return_to','trucking_company','loading_address','number_container','commodities','remark','user_id','shipper_id'];

    public $timestamps = false;

    public function user () {
    	return $this->hasMany('App\User');
    }
}