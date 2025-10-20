<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('カテゴリ名');
            $table->string('slug')->unique()->comment('スラッグ');
            $table->text('description')->nullable()->comment('説明');
            $table->string('icon')->nullable()->comment('アイコン');
            $table->integer('sort')->default(0)->comment('並び順');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
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
        Schema::dropIfExists('service_categories');
    }
}
