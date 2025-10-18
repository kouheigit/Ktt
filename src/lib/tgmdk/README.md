# TGMDK (GMO Payment Gateway SDK) インストール手順

このディレクトリには、GMOペイメントゲートウェイのTGMDK（PHP版）を配置します。

## 🎉 モッククラスについて

現在、開発用の**モッククラス**がインストールされています。
このモッククラスは実際の決済を行わず、テスト用のレスポンスを返します。

### モッククラスで実装されている機能
- ✅ クレジットカード与信（authorize）
- ✅ 売上計上（capture）
- ✅ 取引キャンセル（cancel）
- ✅ 返金処理（refund）

### テストページ
モッククラスの動作確認は以下のURLでテストできます：
- **http://localhost:8082/payment/test**

## インストール方法

### 1. TGMDKファイルの取得

GMOペイメントゲートウェイの管理画面から以下のファイルをダウンロードします：

- マーチャント管理画面 → 開発支援 → MDKダウンロード
- PHP版のMDKをダウンロード

### 2. ファイルの配置

ダウンロードしたTGMDKのファイルを以下のように配置します：

```
src/lib/tgmdk/
├── README.md (このファイル)
├── tgMdk/
│   ├── TGMDK_Config.php
│   ├── TGMDK_Transaction.php
│   ├── dto/
│   ├── log/
│   └── ...その他のTGMDKファイル
```

### 3. オートロード更新

ファイルを配置した後、以下のコマンドを実行してオートロードを更新します：

```bash
docker-compose exec app composer dump-autoload
```

### 4. 設定ファイルの作成

TGMDK用の設定ファイルを作成します：

```bash
# .envファイルに以下を追加
TGMDK_MERCHANT_ID=your_merchant_id
TGMDK_MERCHANT_PASS=your_merchant_password
TGMDK_MERCHANT_CC_ID=your_cc_id
TGMDK_MERCHANT_CC_PASS=your_cc_password
TGMDK_CONNECTION_TIMEOUT=90000
TGMDK_CONNECTION_RETRY_INTERVAL=200
TGMDK_CONNECTION_RETRY_COUNT=1
```

## 使用例

```php
use TGMDK_Transaction;

// トランザクション処理
$transaction = new TGMDK_Transaction();
// ... TGMDKの処理
```

## 注意事項

- TGMDKファイルはGitリポジトリにコミットしないでください（.gitignoreに追加済み）
- 本番環境と開発環境で異なるマーチャントIDを使用してください
- ログファイルには機密情報が含まれる可能性があるため、適切に管理してください

## サポート

TGMDKに関する詳細は、GMOペイメントゲートウェイの公式ドキュメントを参照してください。

