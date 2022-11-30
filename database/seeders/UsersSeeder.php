<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'phone' => '0668547122',
            'password' => Hash::make('lorilori'),
            'address' => 'Vale Drive Lorain, OH',
            'role' => 'Admin',
        ]);

        \App\Models\User::factory(10)->create();

    }
}
