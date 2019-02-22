<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTongTinPlayerListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tong_tin_player_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("player_id")->unique();
            $table->integer("num_play");
            $table->integer("status")->default(1); // 1 is active other is inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tong_tin_player_lists');
    }
}
