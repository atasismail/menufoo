<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'displayName' => "ismail Ataş",
            "name" => "ismail",
            "surname" => "Ataş",
            'email' => 'yetkilisistem@gmail.com',
            'userId' => 1,
            'active' => 1,
            'rol' => "admin",
            'password' => Hash::make('ismail123'),
            "apiToken" => Str::random(60),
        ]);
    }
}
