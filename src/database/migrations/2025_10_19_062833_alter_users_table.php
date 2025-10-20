<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // カラムは既にcreate_users_tableで作成済み
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // カラムが存在しない場合があるため、down()は空にしておく
    }
}
