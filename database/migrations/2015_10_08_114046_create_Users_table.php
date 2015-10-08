<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('Users', function(Blueprint $table) {
			$table->increments('user_id');
			$table->timestamps();
			$table->string('name', 255);
			$table->string('email', 255);
			$table->string('city', 255);
			$table->string('ipAddress');
		});
	}

	public function down()
	{
		Schema::drop('Users');
	}
}