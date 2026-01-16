<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // 追加一个用户头像列, 可以为空
            $table->string('avatar')->nullable();
            // 追加一个用户简介列， 可以为空
            $table->string('introduction')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // 删除用户头像列
            $table->dropColumn('avatar');
            // 删除用户简介列
            $table->dropColumn('introduction');
        });
    }
};
