<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Winner extends Model
{
    protected $table = 'winners';


	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}
}
