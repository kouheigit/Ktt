<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            //外部キー
            $table->id();
            $table->foreignId('hotel_id')->constrained();
            $table->foreignId('user_id')->constrained()->comment('予約者');
            $table->foreignId('owner_id')->constrained('users')->comment('オーナー');
            $table->foreignId('calendar_id')->nullable()->constrained();

            //宿泊情報
            $table->date('checkin_date')->comment('チェックイン日');
            $table->date('check_out')->comment('チェックアウト日');
            $table->time('checkin_date')->nullable()->comment('チェックイン時刻');
            $table->time('checkin_out')->nullable()->comment('チェックアウト時刻');
            $table->integer('days')->default(1)->comment('宿泊日数');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
