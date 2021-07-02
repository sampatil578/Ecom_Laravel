<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class user_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([[
            'name' => 'sherlock',
            'email' => 'sherlock@gmail.com',
            'password' => Hash::make('12345678'),
            'contact' => '1234567890',
            'hostel' => 'jasper'
        ],
        [
            'name' => 'johndoe',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('12345678'),
            'contact' => '0123456789',
            'hostel' => 'amber'
        ]]);
    }
}
