<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{

	   protected $fillable = [
      
            'title',      
            'description',
            'user_id'

	];

	public function user()
	{

		return $this->belongTo('App\User','user_id');
	}
    
    public function discussions()
    {

    	return $this->hasMany('App\Discussion');
    }

    public function ownedBy(User $user)
    {

    	return $this->user_id == $user->id;
    }
}
