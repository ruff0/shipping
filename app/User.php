<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'tbl_users';

    protected $fillable = ['id','email','password','company','job_descriptions','contact_name','address','city','zip_code','phone','EIN','fax','IAddress','ACL_ID','logo','notes','state_id','user_type_id','role_id','created_by'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;


    public function state () {
    	return $this->belongTo('App\State');
    }
    public function  user_type () {
    return $this->belongTo('App\UserType');
    }
}