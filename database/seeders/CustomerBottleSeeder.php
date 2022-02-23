<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerBottleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // テーブルにデータを挿入
        DB::table('customer_bottles')->insert([
            [
            'product_name' => '吉四六',
            'bottle_name' => '一応の',
            'amount' => '3',
            'user_id' => '1',
            'customer_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'product_name' => '山﨑',
            'bottle_name' => '一応の',
            'amount' => '3',
            'user_id' => '1',
            'customer_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'product_name' => '山﨑',
            'bottle_name' => '田口の',
            'amount' => '2',
            'user_id' => '1',
            'customer_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'product_name' => '白州',
            'bottle_name' => '',
            'amount' => '',
            'user_id' => '1',
            'customer_id' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
        ]);
    }
}
