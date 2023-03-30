<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'fname' => "Wangny Eymard Romaric",
            'lname' => "OUANGNI",
            'phone' => "+2250788323276",
            'email' => "romaric747@gmail.com",
            'password' => Hash::make('Pa$$w0rd!'),
        ]);
    }
}
