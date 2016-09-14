<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $table = 'tbl_user_types';

    protected $fillable = ['id','name'];

    public $timestamps = false;

    public function custtype_per () {
    	return $this->hasMany('App\Role_Permission');
    }
}