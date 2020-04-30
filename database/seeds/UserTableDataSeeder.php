<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([

	            'name' => 'user',

	            'email' => 'user@user.com',

	            'password' => Hash::make('123456')

	        ]);
    }
}
