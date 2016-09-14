<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'tbl_states';

    protected $fillable = ['id','name'];

    public $timestamps = false;

    public function user () {
    	return $this->hasMany('App\User');
    }
}