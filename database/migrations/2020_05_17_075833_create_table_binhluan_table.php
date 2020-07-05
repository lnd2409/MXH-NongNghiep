<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->bigIncrements('bl_id');
            $table->string('bl_noidung');
            $table->dateTime('bl_thoigian');
            $table->bigInteger('bv_id')->unsigned()->nullable();
            $table->foreign('bv_id')->references('bv_id')->on('baiviet');
            $table->bigInteger('nd_id')->unsigned()->nullable();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan');
            $table->bigInteger('nccvt_id')->unsigned()->nullable();
            $table->foreign('nccvt_id')->references('nccvt_id')->on('nccvt');
            $table->bigInteger('tl_id')->unsigned()->nullable();
            $table->foreign('tl_id')->references('tl_id')->on('thuonglai');
            $table->bigInteger('cg_id')->unsigned()->nullable();
            $table->foreign('cg_id')->references('cg_id')->on('chuyengia');
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
        Schema::dropIfExists('binhluan');
    }
}
