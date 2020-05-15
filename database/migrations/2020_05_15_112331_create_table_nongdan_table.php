<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNongdanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nongdan', function (Blueprint $table) {
            $table->bigIncrements('nd_id')->unsigned();
            $table->timestamps();

            $table->string('nd_taikhoan');
            $table->string('nd_matkhau');
            $table->string('nd_hoten');
            $table->string('nd_diachi');
            $table->string('nd_sdt');
            $table->bigInteger('n_manhom')->unsigned();
            $table->foreign('n_manhom')->references('n_manhom')->on('nhom');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nongdan');
    }
}
