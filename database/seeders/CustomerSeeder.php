<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // テーブルにデータを挿入
         DB::table('customers')->insert([
             [
                 'name' => '鈴木一応',
                 'company' => '株式会社マリナーズ',
                 'memo' => '首位打者',
                 'user_id' => '1',
                 'created_at' => date('Y-m-d H:i:s'),
                 'updated_at' => date('Y-m-d H:i:s')
             ],
             [
                 'name' => '田口荘',
                 'company' => '株式会社pekopa',
                 'memo' => '酔っ払い',
                 'user_id' => '1',
                 'created_at' => date('Y-m-d H:i:s'),
                 'updated_at' => date('Y-m-d H:i:s')
             ],
             [
                 'name' => '朝倉海',
                 'company' => '',
                 'memo' => '',
                 'user_id' => '1',
                 'created_at' => date('Y-m-d H:i:s'),
                 'updated_at' => date('Y-m-d H:i:s')
             ],
        ]);
    }
}
