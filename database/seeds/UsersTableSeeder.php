<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
 			['firstname' => 'admin',
            'middlename' => 'admin',
            'lastname' => 'admin',
            'email' => 'admin@outlook.com',
            'password' => bcrypt('admin'),
	        'contact' => 'admin',
	         'role' => 'admin']
        );
    }
}
