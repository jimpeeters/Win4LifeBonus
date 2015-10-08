<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model {

	protected $table = 'Users';
	public $timestamps = true;
	protected $guarded = array('ipAddress');
	protected $hidden = array('ipAddress');

	public function codes()
	{
		return $this->hasMany('Code', 'FK_user_id');
	}

}