<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCodesTable extends Migration {

	public function up()
	{
		Schema::create('codes', function(Blueprint $table) {
			$table->increments('code_id');
			$table->timestamps();
			$table->string('code', 60);
			$table->integer('FK_user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('codes');
	}
}