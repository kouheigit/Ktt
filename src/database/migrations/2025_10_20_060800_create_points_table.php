<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('ユーザーID');
            $table->integer('current_points')->default(0)->comment('現在のポイント');
            $table->integer('total_earned')->default(0)->comment('累計獲得ポイント');
            $table->integer('total_used')->default(0)->comment('累計使用ポイント');
            $table->integer('total_expired')->default(0)->comment('累計失効ポイント');
            $table->date('last_earned_at')->nullable()->comment('最終獲得日');
            $table->date('last_used_at')->nullable()->comment('最終使用日');
            $table->timestamps();
            
            // インデックス
            $table->index(['user_id']);
            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points');
    }
}
