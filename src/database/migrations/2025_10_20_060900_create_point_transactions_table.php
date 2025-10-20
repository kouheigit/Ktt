<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->string('transaction_type')->comment('取引タイプ: earn, use, expire, refund');
            $table->integer('points')->comment('ポイント数（正:獲得, 負:使用）');
            $table->string('description')->comment('説明');
            $table->string('reference_type')->nullable()->comment('関連タイプ: order, reservation, service');
            $table->unsignedBigInteger('reference_id')->nullable()->comment('関連ID');
            $table->date('expires_at')->nullable()->comment('有効期限');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
            $table->index(['user_id', 'transaction_type']);
            $table->index(['reference_type', 'reference_id']);
            $table->index(['expires_at']);
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
        Schema::dropIfExists('point_transactions');
    }
}
