<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            // システム設定
            [
                'key' => 'site_name',
                'value' => 'KTT ホテル予約システム',
                'type' => 'string',
                'group' => 'system',
                'description' => 'サイト名',
                'sort' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'site_description',
                'value' => '高品質なホテル予約サービスを提供します',
                'type' => 'string',
                'group' => 'system',
                'description' => 'サイト説明',
                'sort' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'group' => 'system',
                'description' => 'メンテナンスモード',
                'sort' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // ポイント設定
            [
                'key' => 'point_earn_rate',
                'value' => '1.0',
                'type' => 'decimal',
                'group' => 'point',
                'description' => 'ポイント獲得率（%）',
                'sort' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'point_expire_days',
                'value' => '365',
                'type' => 'integer',
                'group' => 'point',
                'description' => 'ポイント有効期限（日）',
                'sort' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'point_min_use',
                'value' => '100',
                'type' => 'integer',
                'group' => 'point',
                'description' => 'ポイント最小使用単位',
                'sort' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // 予約設定
            [
                'key' => 'reservation_advance_days',
                'value' => '30',
                'type' => 'integer',
                'group' => 'reservation',
                'description' => '予約可能日数（日前）',
                'sort' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'cancellation_hours',
                'value' => '24',
                'type' => 'integer',
                'group' => 'reservation',
                'description' => 'キャンセル可能時間（時間前）',
                'sort' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'max_guests_per_room',
                'value' => '4',
                'type' => 'integer',
                'group' => 'reservation',
                'description' => '1部屋あたりの最大宿泊人数',
                'sort' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
            // メール設定
            [
                'key' => 'mail_from_address',
                'value' => 'noreply@example.com',
                'type' => 'string',
                'group' => 'mail',
                'description' => '送信者メールアドレス',
                'sort' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'mail_from_name',
                'value' => 'KTT ホテル予約システム',
                'type' => 'string',
                'group' => 'mail',
                'description' => '送信者名',
                'sort' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('settings')->insert($settings);
    }
}