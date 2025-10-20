<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade')->comment('サービスID');
            $table->string('name')->comment('オプション名');
            $table->text('description')->nullable()->comment('説明');
            $table->decimal('price', 10, 2)->default(0)->comment('追加料金');
            $table->string('type')->default('single')->comment('タイプ: single, multiple');
            $table->integer('required')->default(0)->comment('必須: 1, 任意: 0');
            $table->integer('sort')->default(0)->comment('並び順');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
            $table->index(['service_id', 'status']);
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
        Schema::dropIfExists('service_options');
    }
}
