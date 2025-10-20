<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade')->comment('注文ID');
            $table->foreignId('user_id')->nullable()->constrained()->comment('更新者ID');
            $table->string('status')->comment('ステータス');
            $table->text('note')->nullable()->comment('備考');
            $table->timestamp('status_date')->useCurrent()->comment('ステータス変更日時');
            $table->timestamps();
            
            // インデックス
            $table->index(['order_id', 'status_date']);
            $table->index(['status']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_statuses');
    }
}
