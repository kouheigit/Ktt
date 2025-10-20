<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => '管理者',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'member_id' => 'ADMIN001',
                'last_name' => '管理者',
                'first_name' => '太郎',
                'last_kana' => 'カンリシャ',
                'first_kana' => 'タロウ',
                'zip1' => '100',
                'zip2' => '0001',
                'address1' => '東京都千代田区千代田',
                'address2' => '1-1-1',
                'tel' => '03-1234-5678',
                'type' => 2, // オーナー
                'agree' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '山田太郎',
                'email' => 'yamada@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'member_id' => 'USER001',
                'last_name' => '山田',
                'first_name' => '太郎',
                'last_kana' => 'ヤマダ',
                'first_kana' => 'タロウ',
                'zip1' => '150',
                'zip2' => '0001',
                'address1' => '東京都渋谷区渋谷',
                'address2' => '2-2-2',
                'tel' => '03-2345-6789',
                'type' => 1, // 一般
                'agree' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '佐藤花子',
                'email' => 'sato@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'member_id' => 'USER002',
                'last_name' => '佐藤',
                'first_name' => '花子',
                'last_kana' => 'サトウ',
                'first_kana' => 'ハナコ',
                'zip1' => '220',
                'zip2' => '0001',
                'address1' => '神奈川県横浜市西区',
                'address2' => '3-3-3',
                'tel' => '045-3456-7890',
                'type' => 1, // 一般
                'agree' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '田中次郎',
                'email' => 'tanaka@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'member_id' => 'USER003',
                'last_name' => '田中',
                'first_name' => '次郎',
                'last_kana' => 'タナカ',
                'first_kana' => 'ジロウ',
                'zip1' => '460',
                'zip2' => '0001',
                'address1' => '愛知県名古屋市中区',
                'address2' => '4-4-4',
                'tel' => '052-4567-8901',
                'type' => 1, // 一般
                'agree' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '鈴木三郎',
                'email' => 'suzuki@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'member_id' => 'USER004',
                'last_name' => '鈴木',
                'first_name' => '三郎',
                'last_kana' => 'スズキ',
                'first_kana' => 'サブロウ',
                'zip1' => '530',
                'zip2' => '0001',
                'address1' => '大阪府大阪市北区',
                'address2' => '5-5-5',
                'tel' => '06-5678-9012',
                'type' => 1, // 一般
                'agree' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('users')->insert($users);
    }
}