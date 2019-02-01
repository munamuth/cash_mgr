<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function getUserName(){
    	return $this->hasOne('App\User', 'id', 'u_id');
    }
}
