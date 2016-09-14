<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role_Permission extends Model
{
    protected $table = 'tbl_role_per';

    protected $fillable = ['id','per_id','role_id'];

    public $timestamps = false;

    public function user_type () {
    	return $this->belongTo('App\UserType');
    }
}