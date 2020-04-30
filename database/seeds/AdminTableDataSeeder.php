<?php

use App\Models\Admin;

use Illuminate\Database\Seeder;

class AdminTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([

	            'name' => 'admin',

	            'email' => 'admin@admin.com',

	            'password' => Hash::make('123456')

	        ]);
    }
}
