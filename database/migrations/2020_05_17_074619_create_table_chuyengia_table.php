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
            $table->string('cg_linhvuc');
            $table->foreign('cg_linhvuc')->references('cg_linhvuc')->on('linhvucquantam');
            $table->bigInteger('cg_trinhdohocvan');
            $table->foreign('cg_trinhdohocvan')->references('cg_trinhdohocvan')->on('trinhdohocvan');
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
