<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            [
                'visit_date' => '2022-03-24',
                'cash' => '50000',
                'card' => '0',
                'ar' => '0',
                'user_id ' => '1',
                'customer_id ' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'visit_date' => '2022-03-01',
                'cash' => '0',
                'card' => '100000',
                'ar' => '100000',
                'user_id ' => '1',
                'customer_id ' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'visit_date' => '2022-02-12',
                'cash' => '0',
                'card' => '0',
                'ar' => '110000',
                'user_id ' => '1',
                'customer_id ' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
