<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('user_id');
			$table->string('name', 255);
			$table->string('email', 255)->unique();
			$table->string('city', 255);
			$table->string('ipAddress')->nullable();
			$table->string('password', 100);
			$table->rememberToken();
            $table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}

