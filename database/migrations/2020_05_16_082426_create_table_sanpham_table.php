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
            $table->string('sp_gia');
            $table->string('sp_soluongcungcap');

            $table->bigInteger('lsp_id')->unsigned();
            $table->foreign('lsp_id')->reference('lsp_id')->on('loaisanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('nccvt_id')->unsigned();
            $table->foreign('nccvt_id')->reference('nccvt_id')->on('nccvt')->onDelete('CASCADE')->onUpdate('CASCADE');
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
