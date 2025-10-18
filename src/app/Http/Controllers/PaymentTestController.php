<?php

namespace App\Http\Controllers;

use App\Services\TgmdkService;
use Illuminate\Http\Request;

/**
 * 決済テストコントローラー
 * 
 * TGMDKモッククラスの動作確認用
 */
class PaymentTestController extends Controller
{
    protected $tgmdk;

    public function __construct(TgmdkService $tgmdk)
    {
        $this->tgmdk = $tgmdk;
    }

    /**
     * テストページ表示
     */
    public function index()
    {
        $status = [
            'initialized' => $this->tgmdk->isInitialized(),
            'test_mode' => $this->tgmdk->isTestMode(),
            'is_production' => $this->tgmdk->isProduction(),
            'config' => $this->tgmdk->getConfig()
        ];

        return view('payment.test', compact('status'));
    }

    /**
     * 与信テスト
     */
    public function testAuthorize()
    {
        $result = $this->tgmdk->authorize([
            'order_id' => 'TEST-ORDER-' . time(),
            'amount' => 1000,
            'card_number' => '4111111111111111',
            'card_expire' => '12/25',
            'security_code' => '123'
        ]);

        return response()->json($result);
    }

    /**
     * 売上テスト
     */
    public function testCapture(Request $request)
    {
        $result = $this->tgmdk->capture([
            'order_id' => $request->input('order_id'),
            'amount' => $request->input('amount'),
            'txn_id' => $request->input('txn_id')
        ]);

        return response()->json($result);
    }

    /**
     * キャンセルテスト
     */
    public function testCancel(Request $request)
    {
        $result = $this->tgmdk->cancel([
            'order_id' => $request->input('order_id'),
            'txn_id' => $request->input('txn_id')
        ]);

        return response()->json($result);
    }

    /**
     * 返金テスト
     */
    public function testRefund(Request $request)
    {
        $result = $this->tgmdk->refund([
            'order_id' => $request->input('order_id'),
            'amount' => $request->input('amount'),
            'txn_id' => $request->input('txn_id')
        ]);

        return response()->json($result);
    }
}

