<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TGMDK 決済テスト</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        .status {
            background: #e8f5e9;
            border-left: 4px solid #4CAF50;
            padding: 15px;
            margin: 20px 0;
        }
        .status.error {
            background: #ffebee;
            border-left-color: #f44336;
        }
        .test-section {
            margin: 30px 0;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
        }
        button:hover {
            background: #45a049;
        }
        .result {
            margin-top: 15px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 4px;
            white-space: pre-wrap;
            font-family: monospace;
        }
        .success {
            color: #4CAF50;
            font-weight: bold;
        }
        .error {
            color: #f44336;
            font-weight: bold;
        }
        input {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🔧 TGMDK 決済テスト（モック版）</h1>
        
        <div class="status {{ $status['initialized'] ? '' : 'error' }}">
            <h3>ステータス</h3>
            <p><strong>初期化:</strong> {{ $status['initialized'] ? '✅ 成功' : '❌ 失敗' }}</p>
            <p><strong>テストモード:</strong> {{ $status['test_mode'] ? '✅ 有効' : '❌ 無効' }}</p>
            <p><strong>本番環境:</strong> {{ $status['is_production'] ? '⚠️ 本番' : '✅ 開発' }}</p>
            @if($status['initialized'])
                <p><em>※ これはモッククラスです。実際の決済は行われません。</em></p>
            @endif
        </div>

        @if($status['initialized'])
            <!-- 与信テスト -->
            <div class="test-section">
                <h2>1. クレジットカード与信（オーソリ）</h2>
                <p>クレジットカード情報で与信を行います</p>
                <button onclick="testAuthorize()">与信テスト実行</button>
                <div id="authorize-result" class="result" style="display:none;"></div>
            </div>

            <!-- 売上テスト -->
            <div class="test-section">
                <h2>2. 売上計上（キャプチャ）</h2>
                <p>与信した金額を売上計上します</p>
                <input type="text" id="capture-order-id" placeholder="注文ID">
                <input type="number" id="capture-amount" placeholder="金額">
                <input type="text" id="capture-txn-id" placeholder="トランザクションID">
                <button onclick="testCapture()">売上テスト実行</button>
                <div id="capture-result" class="result" style="display:none;"></div>
            </div>

            <!-- キャンセルテスト -->
            <div class="test-section">
                <h2>3. 取引キャンセル</h2>
                <p>与信をキャンセルします</p>
                <input type="text" id="cancel-order-id" placeholder="注文ID">
                <input type="text" id="cancel-txn-id" placeholder="トランザクションID">
                <button onclick="testCancel()">キャンセルテスト実行</button>
                <div id="cancel-result" class="result" style="display:none;"></div>
            </div>

            <!-- 返金テスト -->
            <div class="test-section">
                <h2>4. 返金処理</h2>
                <p>売上を返金します</p>
                <input type="text" id="refund-order-id" placeholder="注文ID">
                <input type="number" id="refund-amount" placeholder="金額">
                <input type="text" id="refund-txn-id" placeholder="トランザクションID">
                <button onclick="testRefund()">返金テスト実行</button>
                <div id="refund-result" class="result" style="display:none;"></div>
            </div>
        @else
            <div class="status error">
                <h3>⚠️ TGMDKが初期化されていません</h3>
                <p>composer dump-autoload を実行してください。</p>
            </div>
        @endif
    </div>

    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        function testAuthorize() {
            fetch('/payment/test/authorize', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(res => res.json())
            .then(data => {
                const result = document.getElementById('authorize-result');
                result.style.display = 'block';
                result.innerHTML = formatResult(data);
                
                // 結果を他のフォームに自動入力
                if (data.success) {
                    document.getElementById('capture-order-id').value = data.order_id;
                    document.getElementById('capture-amount').value = '1000';
                    document.getElementById('capture-txn-id').value = data.txn_id;
                    document.getElementById('cancel-order-id').value = data.order_id;
                    document.getElementById('cancel-txn-id').value = data.txn_id;
                }
            })
            .catch(err => console.error(err));
        }

        function testCapture() {
            const orderId = document.getElementById('capture-order-id').value;
            const amount = document.getElementById('capture-amount').value;
            const txnId = document.getElementById('capture-txn-id').value;

            fetch('/payment/test/capture', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ order_id: orderId, amount: amount, txn_id: txnId })
            })
            .then(res => res.json())
            .then(data => {
                const result = document.getElementById('capture-result');
                result.style.display = 'block';
                result.innerHTML = formatResult(data);
            })
            .catch(err => console.error(err));
        }

        function testCancel() {
            const orderId = document.getElementById('cancel-order-id').value;
            const txnId = document.getElementById('cancel-txn-id').value;

            fetch('/payment/test/cancel', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ order_id: orderId, txn_id: txnId })
            })
            .then(res => res.json())
            .then(data => {
                const result = document.getElementById('cancel-result');
                result.style.display = 'block';
                result.innerHTML = formatResult(data);
            })
            .catch(err => console.error(err));
        }

        function testRefund() {
            const orderId = document.getElementById('refund-order-id').value;
            const amount = document.getElementById('refund-amount').value;
            const txnId = document.getElementById('refund-txn-id').value;

            fetch('/payment/test/refund', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ order_id: orderId, amount: amount, txn_id: txnId })
            })
            .then(res => res.json())
            .then(data => {
                const result = document.getElementById('refund-result');
                result.style.display = 'block';
                result.innerHTML = formatResult(data);
            })
            .catch(err => console.error(err));
        }

        function formatResult(data) {
            const status = data.success ? '<span class="success">✅ 成功</span>' : '<span class="error">❌ 失敗</span>';
            return status + '\n\n' + JSON.stringify(data, null, 2);
        }
    </script>
</body>
</html>

