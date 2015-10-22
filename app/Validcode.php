<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validcode extends Model
{
   	protected $table = 'validCodes';


	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

}
