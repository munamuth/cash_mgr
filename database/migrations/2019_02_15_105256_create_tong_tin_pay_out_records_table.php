<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTongTinPayOutRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tong_tin_pay_out_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("tongtin_id");
            $table->double("payout_amount");
            $table->integer("num_paid");
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
        Schema::dropIfExists('tong_tin_pay_out_records');
    }
}
