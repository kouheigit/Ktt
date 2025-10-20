<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id')->constrained()->comment('サービスカテゴリID');
            $table->foreignId('hotel_id')->constrained()->comment('ホテルID');
            $table->string('name')->comment('サービス名');
            $table->string('slug')->unique()->comment('スラッグ');
            $table->text('description')->nullable()->comment('説明');
            $table->text('detail')->nullable()->comment('詳細説明');
            $table->decimal('price', 10, 2)->default(0)->comment('価格');
            $table->string('unit')->default('回')->comment('単位');
            $table->integer('duration')->nullable()->comment('所要時間（分）');
            $table->string('image')->nullable()->comment('画像');
            $table->json('images')->nullable()->comment('複数画像');
            $table->integer('capacity')->nullable()->comment('定員');
            $table->integer('min_advance_days')->default(1)->comment('最小予約日数');
            $table->integer('max_advance_days')->nullable()->comment('最大予約日数');
            $table->time('start_time')->nullable()->comment('開始時間');
            $table->time('end_time')->nullable()->comment('終了時間');
            $table->json('available_days')->nullable()->comment('利用可能曜日');
            $table->integer('sort')->default(0)->comment('並び順');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
            $table->index(['service_category_id', 'status']);
            $table->index(['hotel_id', 'status']);
            $table->index(['status', 'sort']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
