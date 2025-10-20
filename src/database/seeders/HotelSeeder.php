<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = [
            [
                'name' => 'リゾートホテル オーシャンビュー',
                'address' => '沖縄県那覇市字安里123-1',
                'description' => '美しい海を望むリゾートホテル。プライベートビーチとスパ施設を完備。',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '山のホテル フォレスト',
                'address' => '長野県軽井沢町字軽井沢456-2',
                'description' => '自然に囲まれた静寂な山のホテル。温泉と森林浴を楽しめます。',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'シティホテル グランド',
                'address' => '東京都新宿区西新宿1-2-3',
                'description' => '都心の便利な立地にあるビジネスホテル。会議室とレストランを完備。',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '温泉旅館 花月',
                'address' => '静岡県熱海市熱海町789-4',
                'description' => '伝統的な日本旅館。天然温泉と懐石料理をお楽しみいただけます。',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ペンション コテージ',
                'address' => '北海道富良野市字富良野101-5',
                'description' => '家族連れに人気のコテージ型ペンション。アウトドアアクティビティが充実。',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('hotels')->insert($hotels);
    }
}