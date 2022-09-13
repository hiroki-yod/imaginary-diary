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
        Schema::create('diaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('title', 50);
            $table->string('body', 3000)->nullable();
            $table->string('image_path', 100)->nullable();
            $table->string('audio', 100)->nullable();
            $table->integer('year');    //マイナスの符号によって紀元前を表現
            $table->integer('month');       //紀元前１万年まで扱えないために'year'を分離
            $table->integer('date');    //dateをmonthと分離
            $table->timestamps();
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
        Schema::dropIfExists('diaries');
    }
};
