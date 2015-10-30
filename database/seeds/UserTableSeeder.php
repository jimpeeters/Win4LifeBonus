<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        	DB::table('users')->delete();

			$users = array(

				array(	'name' => 'admin',
						'admin1_user0' => 1,
						'email' => 'admin@test.be',
						'password' => Hash::make('root'),
						'city' => 'Antwerpen')
				);

		DB::table('users')->insert($users);
    }
}
