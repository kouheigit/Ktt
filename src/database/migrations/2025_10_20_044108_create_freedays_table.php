<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreedaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freedays', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->integer('freedays')->default(0)->comment('残り泊数');
            $table->date('start_date')->comment('利用開始日');
            $table->date('end_date')->comment('有効期限');
            $table->integer('status')->default(1);
            $table->timestamps();

            $table->index(['user_id', 'end_date']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freedays');
    }
}
