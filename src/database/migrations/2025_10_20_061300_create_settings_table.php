<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique()->comment('設定キー');
            $table->text('value')->nullable()->comment('設定値');
            $table->string('type')->default('string')->comment('値のタイプ: string, integer, boolean, json');
            $table->string('group')->default('general')->comment('設定グループ');
            $table->text('description')->nullable()->comment('説明');
            $table->integer('sort')->default(0)->comment('並び順');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
            $table->index(['group', 'status']);
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
        Schema::dropIfExists('settings');
    }
}
