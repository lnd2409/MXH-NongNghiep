<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableChuyengiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyengia', function (Blueprint $table) {
            $table->bigIncrements('cg_id');
            $table->string('cg_hoten');
            $table->string('cg_diachi');
            $table->integer('cg_sdt');
            $table->bigInteger('lv_id')->unsigned();
            $table->foreign('lv_id')->references('lv_id')->on('linhvucquantam');
            $table->bigInteger('td_id')->unsigned();
            $table->foreign('td_id')->references('td_id')->on('trinhdo');
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
        Schema::dropIfExists('chuyengia');
    }
}
