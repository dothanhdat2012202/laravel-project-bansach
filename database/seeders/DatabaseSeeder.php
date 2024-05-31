<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //    DB::table('users')->insert([
    //     'fullname' => 'An',
    //     'email' => 'an@gmail.com',
    //     'password' => bcrypt(request('123'))
    //    ]);
        $this->call([
            Customer_seeder::class
        ]);
    }
}
