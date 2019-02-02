<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
	public function getType($value='')
	{
		return $this->hasOne('App\Type', 'id', 'type');
	}
	public function getUserName(){
    	return $this->hasOne('App\User', 'id', 'u_id');
    }
    
}
