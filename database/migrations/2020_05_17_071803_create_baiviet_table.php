<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->bigIncrements('bv_id');

            $table->string('bv_tieude');
            $table->string('bv_noidung');
            $table->date('bv_thoigian');


            $table->bigInteger('n_id')->unsigned()->nullable();
            $table->foreign('n_id')->references('n_id')->on('nhom')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('nd_id')->unsigned()->nullable();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('cg_id')->unsigned()->nullable();
            $table->foreign('cg_id')->references('cg_id')->on('chuyengia')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('tl_id')->unsigned()->nullable();
            $table->foreign('tl_id')->references('tl_id')->on('thuonglai')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('baiviet');
    }
}
