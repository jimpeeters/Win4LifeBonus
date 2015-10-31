<?php

use Illuminate\Database\Seeder;

class WinnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('winners')->delete();

			$winners = array(

				array(	'FK_user_id' => 0,
						'winningMonth' => '10'),
				array(	'FK_user_id' => 0,
						'winningMonth' => '11'),
				array(	'FK_user_id' => 0,
						'winningMonth' => '12'),
				array(	'FK_user_id' => 0,
						'winningMonth' => '1'),
				array(	'FK_user_id' => 0,
						'winningMonth' => '2'),
				);

		DB::table('winners')->insert($winners);
    }
}
