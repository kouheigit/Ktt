<?php

return [
    /*
    |--------------------------------------------------------------------------
    | TGMDK (GMO Payment Gateway) Configuration
    |--------------------------------------------------------------------------
    |
    | GMOペイメントゲートウェイのTGMDK設定
    |
    */

    // マーチャントID
    'merchant_id' => env('TGMDK_MERCHANT_ID', ''),

    // マーチャントパスワード
    'merchant_pass' => env('TGMDK_MERCHANT_PASS', ''),

    // マーチャントCCID
    'merchant_cc_id' => env('TGMDK_MERCHANT_CC_ID', ''),

    // マーチャントCCパスワード
    'merchant_cc_pass' => env('TGMDK_MERCHANT_CC_PASS', ''),

    // 接続タイムアウト（ミリ秒）
    'connection_timeout' => env('TGMDK_CONNECTION_TIMEOUT', 90000),

    // リトライ間隔（ミリ秒）
    'connection_retry_interval' => env('TGMDK_CONNECTION_RETRY_INTERVAL', 200),

    // リトライ回数
    'connection_retry_count' => env('TGMDK_CONNECTION_RETRY_COUNT', 1),

    // 本番環境フラグ
    'is_production' => env('TGMDK_IS_PRODUCTION', false),

    // ログ出力設定
    'log' => [
        'enabled' => env('TGMDK_LOG_ENABLED', true),
        'path' => env('TGMDK_LOG_PATH', storage_path('logs/tgmdk')),
        'level' => env('TGMDK_LOG_LEVEL', 'debug'), // debug, info, warning, error
    ],

    // テストモード設定
    'test_mode' => [
        'enabled' => env('TGMDK_TEST_MODE', true),
        'card_number' => env('TGMDK_TEST_CARD_NUMBER', '4111111111111111'),
        'card_expire' => env('TGMDK_TEST_CARD_EXPIRE', '12/25'),
        'card_cvv' => env('TGMDK_TEST_CARD_CVV', '123'),
    ],
];

