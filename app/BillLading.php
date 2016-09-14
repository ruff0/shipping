<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillLading extends Model
{
    protected $table = 'tbl_bill_lading';

    protected $fillable = ['id','consignee','delivery','containerno','package_no','kind_package_no','gross_weight','measurement','number_original','place_receipt','place_issue','date_laden','book_id'];

    public $timestamps = false;

    public function booking () {
    	return $this->hasMany('App\BookingOrder');
    }
}