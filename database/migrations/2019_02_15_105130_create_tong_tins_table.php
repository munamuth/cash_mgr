<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTongTinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tong_tins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leader_id');
            $table->integer('amount');
            $table->integer("user_list_id");
            $table->integer("payout_type"); // 1 is monthly; 2 is weekly
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
        Schema::dropIfExists('tong_tins');
    }
}
