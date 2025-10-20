<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->string('type')->comment('通知タイプ');
            $table->string('title')->comment('タイトル');
            $table->text('message')->comment('メッセージ');
            $table->json('data')->nullable()->comment('追加データ（JSON）');
            $table->timestamp('read_at')->nullable()->comment('既読日時');
            $table->timestamp('sent_at')->nullable()->comment('送信日時');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
            $table->index(['user_id', 'status']);
            $table->index(['type', 'status']);
            $table->index(['read_at']);
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
        Schema::dropIfExists('notifications');
    }
}
