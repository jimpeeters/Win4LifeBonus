<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model {

	protected $table = 'codes';
	public $timestamps = true;
	protected $guarded = array('winning1_losing0');
	protected $hidden = array('winning1_losing0');

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

}