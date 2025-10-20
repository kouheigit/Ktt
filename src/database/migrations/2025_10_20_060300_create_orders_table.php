<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique()->comment('注文番号');
            $table->foreignId('user_id')->constrained()->comment('注文者ID');
            $table->foreignId('hotel_id')->constrained()->comment('ホテルID');
            $table->foreignId('reservation_id')->nullable()->constrained()->comment('予約ID');
            
            // 注文情報
            $table->decimal('subtotal', 10, 2)->default(0)->comment('小計');
            $table->decimal('tax_amount', 10, 2)->default(0)->comment('消費税額');
            $table->decimal('discount_amount', 10, 2)->default(0)->comment('割引額');
            $table->decimal('total_amount', 10, 2)->default(0)->comment('合計金額');
            $table->string('currency', 3)->default('JPY')->comment('通貨');
            
            // 決済情報
            $table->string('payment_method')->nullable()->comment('決済方法');
            $table->string('payment_status')->default('pending')->comment('決済ステータス');
            $table->string('transaction_id')->nullable()->comment('取引ID');
            $table->timestamp('paid_at')->nullable()->comment('決済日時');
            
            // 配送情報
            $table->string('delivery_method')->nullable()->comment('配送方法');
            $table->string('delivery_status')->default('pending')->comment('配送ステータス');
            $table->timestamp('shipped_at')->nullable()->comment('発送日時');
            $table->timestamp('delivered_at')->nullable()->comment('配送完了日時');
            
            // 注文ステータス
            $table->string('status')->default('pending')->comment('注文ステータス');
            $table->text('notes')->nullable()->comment('備考');
            $table->timestamps();
            
            // インデックス
            $table->index(['user_id', 'status']);
            $table->index(['hotel_id', 'status']);
            $table->index(['payment_status', 'status']);
            $table->index(['created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
