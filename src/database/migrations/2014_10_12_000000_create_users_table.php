<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('last_name')->nullable();
            $table->string('frist_name')->nullable();
            $table->string('last_kana')->nullable();
            $table->string('first_kana')->nullable();
            $table->string('zip1',3)->nullable();
            $table->string('zip2',4)->nullable();
           $table->string('address1')->nullable();
           $table->string('address2')->nullable();
           $table->string('tel',20)->nullable();

           //会社情報
            $table->string('company_name')->nullable();
            $table->string('company_kana')->nullable();
            $table->string('company_zip1', 3)->nullable();
            $table->string('company_zip2', 4)->nullable();
            $table->string('company_address1')->nullable();
            $table->string('company_address2')->nullable();
            $table->string('company_tel',20)->nullable();
            $table->string('company_fax',20)->nullable();
            //送付先情報
            $table->string('send_name')->nullable();
            $table->string('send_kana')->nullable();
            $table->string('send_zip1',3)->nullable();
            $table->string('send_zip2',4)->nullable();
            $table->string('send_address1')->nullable();
            $table->string('send_address2')->nullable();
            $table->string('send_tel', 20)->nullable();

            //システム情報
            $table->integer('type')->default(1)->comment('1:一般,2:オーナー');
            $table->integer('agree')->default(0)->comment('利用規約同意');
            $table->integer('status')->default(1)->comment('1:有効,0:無効');
            $table->integer('user_id')->nullable()->comment('親ユーザーID(オーナーの場合)');

            //論理削除
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
