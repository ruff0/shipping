<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrivalNotice extends Model
{
    protected $table = 'tbl_arrival_notice';

    protected $fillable = ['mode','PU_no','container_no','shipping_line','master_BL','AMS_BL','House_BL','Final_ETA','IT_no','date_it_issued', 'last_free_date','GO_date','cargo_location','remit_payment','freight_collect','handling_fee','ams_fee','ddc','demurrage','inland_freight','custom_clearance','custom_duty','custom_bond','examination_fee','cfs_charges','thc_fee','origin_charges','chassis_charges','pier_pass_charges','IT_entry_charges','amount_due','prepare_by','book_id'];

    public $timestamps = false;

    public function booking () {
    	return $this->hasMany('App\BookingOrder');
    }
}