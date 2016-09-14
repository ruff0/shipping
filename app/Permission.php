<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'tbl_permission';

    protected $fillable = ['id','name'];

    public $timestamps = false;

    public function usertype () {
    	return $this->hasMany('App\UserType');
    }
    public function permission () {
    	return $this->hasMany('App\Permission');
    }
}