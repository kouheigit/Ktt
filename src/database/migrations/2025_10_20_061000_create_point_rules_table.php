<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_rules', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('ルール名');
            $table->string('type')->comment('タイプ: earn_rate, earn_fixed, use_rate, use_fixed');
            $table->decimal('rate', 5, 2)->nullable()->comment('レート（%）');
            $table->integer('fixed_points')->nullable()->comment('固定ポイント');
            $table->decimal('min_amount', 10, 2)->nullable()->comment('最小金額');
            $table->decimal('max_amount', 10, 2)->nullable()->comment('最大金額');
            $table->integer('max_points')->nullable()->comment('最大ポイント');
            $table->string('target_type')->nullable()->comment('対象タイプ: order, reservation, service');
            $table->json('conditions')->nullable()->comment('条件（JSON）');
            $table->date('start_date')->nullable()->comment('開始日');
            $table->date('end_date')->nullable()->comment('終了日');
            $table->integer('priority')->default(0)->comment('優先度');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
            $table->index(['type', 'status']);
            $table->index(['target_type', 'status']);
            $table->index(['start_date', 'end_date']);
            $table->index(['priority']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('point_rules');
    }
}
