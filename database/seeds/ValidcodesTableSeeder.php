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

				array(	'validCode' => Hash::make('1110578abc'),
						'winning1_losing0' => 1,
						'month' => 10),
				array(	'validCode' => Hash::make('154578adfc'),
						'winning1_losing0' => 1,
						'month' => 11),
				array(	'validCode' => Hash::make('245178bxwb'),
						'winning1_losing0' => 1,
						'month' => 12),
				array(	'validCode' => Hash::make('136578ghec'),
						'winning1_losing0' => 1,
						'month' => 13),
				array(	'validCode' => Hash::make('548205abfc'),
						'winning1_losing0' => 1,
						'month' => 14),

				array(	'validCode' => Hash::make('165478gfgc'),
						'winning1_losing0' => 0,
						'month' => 10),
				array(	'validCode' => Hash::make('692578avfc'),
						'winning1_losing0' => 0,
						'month' => 10),
				array(	'validCode' => Hash::make('6548578sdc'),
						'winning1_losing0' => 0,
						'month' => 10),
				array(	'validCode' => Hash::make('5654821abc'),
						'winning1_losing0' => 0,
						'month' => 10),
				array(	'validCode' => Hash::make('154578adfc'),
						'winning1_losing0' => 0,
						'month' => 11),
				array(	'validCode' => Hash::make('145578fdfc'),
						'winning1_losing0' => 0,
						'month' => 11),
				array(	'validCode' => Hash::make('456978qkfc'),
						'winning1_losing0' => 0,
						'month' => 11),
				array(	'validCode' => Hash::make('564878aafc'),
						'winning1_losing0' => 0,
						'month' => 12),
				array(	'validCode' => Hash::make('184578adfc'),
						'winning1_losing0' => 0,
						'month' => 13),
				array(	'validCode' => Hash::make('159578adfk'),
						'winning1_losing0' => 0,
						'month' => 14)
				);

		DB::table('validCodes')->insert($codes);
    }
}
