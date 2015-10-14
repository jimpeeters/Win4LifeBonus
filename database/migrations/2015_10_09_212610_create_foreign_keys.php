<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('codes', function(Blueprint $table) {
			$table->foreign('FK_user_id')->references('user_id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('codes', function(Blueprint $table) {
			$table->dropForeign('codes_FK_user_id_foreign');
		});
	}
}