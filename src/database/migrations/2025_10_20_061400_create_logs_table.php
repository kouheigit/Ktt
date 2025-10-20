<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->string('level')->comment('ログレベル: debug, info, warning, error, critical');
            $table->string('channel')->default('local')->comment('ログチャンネル');
            $table->text('message')->comment('ログメッセージ');
            $table->json('context')->nullable()->comment('コンテキスト（JSON）');
            $table->string('user_id')->nullable()->comment('ユーザーID');
            $table->string('ip_address')->nullable()->comment('IPアドレス');
            $table->string('user_agent')->nullable()->comment('ユーザーエージェント');
            $table->string('url')->nullable()->comment('URL');
            $table->string('method')->nullable()->comment('HTTPメソッド');
            $table->timestamps();
            
            // インデックス
            $table->index(['level', 'created_at']);
            $table->index(['channel', 'created_at']);
            $table->index(['user_id', 'created_at']);
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
        Schema::dropIfExists('logs');
    }
}
