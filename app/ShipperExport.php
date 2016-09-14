<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipperExport extends Model
{
    protected $table = 'tbl_shipper_export';

    protected $fillable = ['exporter','export_ref','method_trans','country_des','date_export','parties_trans','domestic_routing','export_carrier','containerized','type_move','value','book_id'];

    public $timestamps = false;

    public function booking () {
    	return $this->hasMany('App\BookingOrder');
    }
}