<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade')->comment('注文ID');
            $table->foreignId('service_id')->constrained()->comment('サービスID');
            $table->string('item_type')->default('service')->comment('アイテムタイプ: service, product');
            $table->string('item_name')->comment('アイテム名');
            $table->text('item_description')->nullable()->comment('アイテム説明');
            $table->decimal('unit_price', 10, 2)->comment('単価');
            $table->integer('quantity')->default(1)->comment('数量');
            $table->decimal('total_price', 10, 2)->comment('合計価格');
            $table->json('options')->nullable()->comment('選択オプション');
            $table->date('service_date')->nullable()->comment('サービス提供日');
            $table->time('service_time')->nullable()->comment('サービス提供時間');
            $table->timestamps();
            
            // インデックス
            $table->index(['order_id']);
            $table->index(['service_id']);
            $table->index(['service_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
