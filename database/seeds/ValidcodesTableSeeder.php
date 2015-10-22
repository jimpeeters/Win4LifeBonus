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
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty2',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty3',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty4',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty5',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty6',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty7',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty8',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty9',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty10',
						'winning1_losing0' => 1,
						'imgPath' => 'lot-win.jpg'),
				array(	'validCode' => 'azerty11',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty12',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty13',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty14',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty15',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty16',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty17',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty18',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty19',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg'),
				array(	'validCode' => 'azerty20',
						'winning1_losing0' => 0,
						'imgPath' => 'lot-lose.jpg')
				);

		DB::table('validCodes')->insert($codes);
    }
}
