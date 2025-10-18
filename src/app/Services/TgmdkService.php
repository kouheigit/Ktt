<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

/**
 * TGMDKサービスクラス
 * 
 * GMOペイメントゲートウェイのTGMDKを使用した決済処理を行います。
 */
class TgmdkService
{
    /**
     * @var array TGMDK設定
     */
    protected $config;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->config = config('tgmdk');
    }

    /**
     * TGMDK初期化確認
     * 
     * @return bool
     */
    public function isInitialized(): bool
    {
        // TGMDKのクラスが存在するか確認
        return class_exists('TGMDK_Transaction');
    }

    /**
     * クレジットカード与信処理（オーソリ）
     * 
     * @param array $params 決済パラメータ
     * @return array 処理結果
     */
    public function authorize(array $params): array
    {
        if (!$this->isInitialized()) {
            Log::error('TGMDK is not initialized. Please install TGMDK SDK first.');
            return [
                'success' => false,
                'error' => 'TGMDK SDK is not installed. Please check lib/tgmdk/README.md for installation instructions.'
            ];
        }

        try {
            // リクエストDTO作成
            $request = new \CardAuthorizeRequestDto();
            $request->setOrderId($params['order_id'] ?? 'ORDER-' . uniqid());
            $request->setAmount($params['amount'] ?? 0);
            
            if (isset($params['card_number'])) {
                $request->setCardNumber($params['card_number']);
            }
            if (isset($params['card_expire'])) {
                $request->setCardExpire($params['card_expire']);
            }
            if (isset($params['security_code'])) {
                $request->setSecurityCode($params['security_code']);
            }
            if (isset($params['token'])) {
                $request->setToken($params['token']);
            }

            // トランザクション実行
            $transaction = new \TGMDK_Transaction();
            $response = $transaction->execute($request);

            Log::info('[TGMDK] Authorize completed', [
                'order_id' => $response->getOrderId(),
                'status' => $response->getMStatus(),
                'result_code' => $response->getVResultCode()
            ]);

            return [
                'success' => $response->isSuccess(),
                'order_id' => $response->getOrderId(),
                'txn_id' => $response->getTxnId(),
                'result_code' => $response->getVResultCode(),
                'message' => $response->getMerrMsg(),
                'center_request_number' => $response->getCenterRequestNumber(),
                'center_request_date' => $response->getCenterRequestDate()
            ];
        } catch (\Exception $e) {
            Log::error('TGMDK authorize failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * クレジットカード売上処理（キャプチャ）
     * 
     * @param array $params 決済パラメータ
     * @return array 処理結果
     */
    public function capture(array $params): array
    {
        if (!$this->isInitialized()) {
            return [
                'success' => false,
                'error' => 'TGMDK SDK is not installed.'
            ];
        }

        try {
            $request = new \CardCaptureRequestDto();
            $request->setOrderId($params['order_id']);
            $request->setAmount($params['amount']);
            $request->setTxnId($params['txn_id']);

            $transaction = new \TGMDK_Transaction();
            $response = $transaction->execute($request);

            Log::info('[TGMDK] Capture completed', [
                'order_id' => $response->getOrderId(),
                'status' => $response->getMStatus()
            ]);

            return [
                'success' => $response->isSuccess(),
                'order_id' => $response->getOrderId(),
                'result_code' => $response->getVResultCode(),
                'message' => $response->getMerrMsg()
            ];
        } catch (\Exception $e) {
            Log::error('TGMDK capture failed', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * クレジットカードキャンセル処理
     * 
     * @param array $params 決済パラメータ
     * @return array 処理結果
     */
    public function cancel(array $params): array
    {
        if (!$this->isInitialized()) {
            return [
                'success' => false,
                'error' => 'TGMDK SDK is not installed.'
            ];
        }

        try {
            $request = new \CardCancelRequestDto();
            $request->setOrderId($params['order_id']);
            $request->setTxnId($params['txn_id']);

            $transaction = new \TGMDK_Transaction();
            $response = $transaction->execute($request);

            Log::info('[TGMDK] Cancel completed', [
                'order_id' => $response->getOrderId(),
                'status' => $response->getMStatus()
            ]);

            return [
                'success' => $response->isSuccess(),
                'order_id' => $response->getOrderId(),
                'result_code' => $response->getVResultCode(),
                'message' => $response->getMerrMsg()
            ];
        } catch (\Exception $e) {
            Log::error('TGMDK cancel failed', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * クレジットカード返金処理
     * 
     * @param array $params 決済パラメータ
     * @return array 処理結果
     */
    public function refund(array $params): array
    {
        if (!$this->isInitialized()) {
            return [
                'success' => false,
                'error' => 'TGMDK SDK is not installed.'
            ];
        }

        try {
            $request = new \CardRefundRequestDto();
            $request->setOrderId($params['order_id']);
            $request->setAmount($params['amount']);
            $request->setTxnId($params['txn_id']);

            $transaction = new \TGMDK_Transaction();
            $response = $transaction->execute($request);

            Log::info('[TGMDK] Refund completed', [
                'order_id' => $response->getOrderId(),
                'status' => $response->getMStatus()
            ]);

            return [
                'success' => $response->isSuccess(),
                'order_id' => $response->getOrderId(),
                'result_code' => $response->getVResultCode(),
                'message' => $response->getMerrMsg()
            ];
        } catch (\Exception $e) {
            Log::error('TGMDK refund failed', [
                'error' => $e->getMessage()
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    /**
     * 設定情報取得
     * 
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'merchant_id' => $this->config['merchant_id'],
            'is_production' => $this->config['is_production'],
            'test_mode' => $this->config['test_mode']['enabled'],
            'log_enabled' => $this->config['log']['enabled'],
        ];
    }

    /**
     * テストモード確認
     * 
     * @return bool
     */
    public function isTestMode(): bool
    {
        return $this->config['test_mode']['enabled'];
    }

    /**
     * 本番環境確認
     * 
     * @return bool
     */
    public function isProduction(): bool
    {
        return $this->config['is_production'];
    }
}

