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
						'winningMonth' => 'November'),
				array(	'FK_user_id' => 0,
						'winningMonth' => 'December'),
				array(	'FK_user_id' => 0,
						'winningMonth' => 'Januari'),
				array(	'FK_user_id' => 0,
						'winningMonth' => 'Februari'),
				);

		DB::table('winners')->insert($winners);
    }
}
