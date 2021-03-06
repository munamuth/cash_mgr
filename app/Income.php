<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Income extends Model
{
    public function getType()
    {
    	return $this->hasOne('App\Type', 'id', 'type');
    }
    public function getUserName(){
    	return $this->hasOne('App\User', 'id', 'u_id');
    }
}
