<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{

	   protected $fillable = [
      
            'title',      
            'description'

	];

	public function user()
	{

		return $this->belongTo('App\User','user_id');
	}
    
}
