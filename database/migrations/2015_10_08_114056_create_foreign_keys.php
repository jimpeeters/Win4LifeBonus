<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('Codes', function(Blueprint $table) {
			$table->foreign('FK_user_id')->references('user_id')->on('Users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('Codes', function(Blueprint $table) {
			$table->dropForeign('Codes_FK_user_id_foreign');
		});
	}
}