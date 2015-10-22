<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValidCodesTable extends Migration
{
    public function up()
    {
        Schema::create('validCodes', function(Blueprint $table) {
            $table->increments('id');
            $table->string('validCode', 20);
            $table->string('imgPath', 100);
            $table->integer('FK_user_id')->unsigned();
            $table->boolean('winning1_losing0')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('validCodes');
    }
}
