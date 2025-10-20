<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'レストラン',
                'slug' => 'restaurant',
                'description' => 'ホテル内レストランでの食事サービス',
                'icon' => 'fa-utensils',
                'sort' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'スパ・マッサージ',
                'slug' => 'spa-massage',
                'description' => 'リラクゼーション・美容サービス',
                'icon' => 'fa-spa',
                'sort' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'アクティビティ',
                'slug' => 'activity',
                'description' => '各種アクティビティ・体験サービス',
                'icon' => 'fa-hiking',
                'sort' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '送迎サービス',
                'slug' => 'transport',
                'description' => '空港・駅送迎サービス',
                'icon' => 'fa-car',
                'sort' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'その他',
                'slug' => 'other',
                'description' => 'その他のサービス',
                'icon' => 'fa-ellipsis-h',
                'sort' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('service_categories')->insert($categories);
    }
}