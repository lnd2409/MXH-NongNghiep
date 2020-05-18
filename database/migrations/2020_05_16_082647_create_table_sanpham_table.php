<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->bigIncrements('sp_id');
            $table->string('sp_ten');
            $table->string('sp_chitiet');
            $table->integer('sp_gia');
            $table->integer('sp_soluongcungcap');

            $table->bigInteger('lsp_id')->unsigned();
            $table->foreign('lsp_id')->references('lsp_id')->on('loaisanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('nccvt_id')->unsigned();
            $table->foreign('nccvt_id')->references('nccvt_id')->on('nccvt')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('sanpham');
    }
}
