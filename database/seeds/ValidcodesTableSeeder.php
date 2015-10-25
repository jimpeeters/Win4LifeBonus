<?php

use Illuminate\Database\Seeder;

class ValidcodesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('validCodes')->delete();

			$codes = array(

				array(	'validCode' => 'azerty1',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty2',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty3',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty4',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty5',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty6',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty7',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty8',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty9',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty10',
						'winning1_losing0' => 1),
				array(	'validCode' => 'azerty11',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty12',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty13',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty14',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty15',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty16',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty17',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty18',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty19',
						'winning1_losing0' => 0),
				array(	'validCode' => 'azerty20',
						'winning1_losing0' => 0)
				);

		DB::table('validCodes')->insert($codes);
    }
}
