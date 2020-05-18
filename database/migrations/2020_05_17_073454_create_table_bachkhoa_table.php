<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBachkhoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bachkhoa', function (Blueprint $table) {
            $table->bigIncrements('bk_id');
            $table->string('bk_tieude');
            $table->text('bk_noidung');
            $table->dateTime('bk_ngaydang');
            $table->bigInteger('cg_id');
            //Tao khoa ngoai
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
        Schema::dropIfExists('bachkhoa');
    }
}
