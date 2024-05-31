<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Customer_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            'customer_name' => 'Nguyễn Bình An',
            'customer_phone' => '0766095648',
            'customer_gmail' => '50.000',
            'customer_password' => '0123456789',
            'customer_gmail' => '0',
        ]);
    }
}
