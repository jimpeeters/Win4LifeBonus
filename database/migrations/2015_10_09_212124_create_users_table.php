<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->string('email', 255)->unique();
			$table->string('ipAddress')->nullable();
			$table->string('ipAddressProxy')->nullable();
			$table->string('city', 255);
			$table->string('password', 100);
			$table->boolean('admin1_user0')->default(0);
			$table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}

