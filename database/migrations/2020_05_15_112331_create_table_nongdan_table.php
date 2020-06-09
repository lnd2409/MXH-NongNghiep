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
            $table->string('username');
            $table->string('password');
            $table->string('nd_hoten');
            $table->string('nd_diachi');
            $table->string('nd_sdt');
            $table->string('nd_hinhanh')->nullable();
            $table->string('nd_background')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('nongdan');
    }
}
