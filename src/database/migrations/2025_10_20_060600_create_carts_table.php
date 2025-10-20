<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->foreignId('hotel_id')->constrained()->comment('ホテルID');
            $table->string('session_id')->nullable()->comment('セッションID（ゲスト用）');
            $table->decimal('subtotal', 10, 2)->default(0)->comment('小計');
            $table->decimal('tax_amount', 10, 2)->default(0)->comment('消費税額');
            $table->decimal('discount_amount', 10, 2)->default(0)->comment('割引額');
            $table->decimal('total_amount', 10, 2)->default(0)->comment('合計金額');
            $table->integer('item_count')->default(0)->comment('アイテム数');
            $table->timestamp('expires_at')->nullable()->comment('有効期限');
            $table->timestamps();
            
            // インデックス
            $table->index(['user_id']);
            $table->index(['session_id']);
            $table->index(['hotel_id']);
            $table->index(['expires_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
