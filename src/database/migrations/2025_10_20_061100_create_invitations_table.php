<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->comment('ホテルID');
            $table->foreignId('owner_id')->constrained('users')->comment('オーナーID');
            $table->string('invitation_code')->unique()->comment('招待コード');
            $table->string('email')->nullable()->comment('招待先メールアドレス');
            $table->string('name')->nullable()->comment('招待先名');
            $table->text('message')->nullable()->comment('招待メッセージ');
            $table->date('expires_at')->nullable()->comment('有効期限');
            $table->integer('max_uses')->default(1)->comment('最大使用回数');
            $table->integer('used_count')->default(0)->comment('使用回数');
            $table->integer('status')->default(1)->comment('1:有効, 0:無効');
            $table->timestamps();
            
            // インデックス
            $table->index(['hotel_id', 'status']);
            $table->index(['owner_id', 'status']);
            $table->index(['expires_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invitations');
    }
}
