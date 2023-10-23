<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //seed
        DB::table('users')->insert([
            [//admin
                'name' => 'Regie',
                'email' => 'regie@gmail.com',
                'password' => Hash::make('Regie123@'),
                'role' => 2,
            ],
            [//user
                'name' => 'John Mark',
                'email' => 'johnmark@gmail.com',
                'password' => Hash::make('Johnmark123@'),
                'role' => 1,
            ]


        ]);
    }
}
