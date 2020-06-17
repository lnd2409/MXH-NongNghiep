<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLinhvucquantamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linhvucquantam', function (Blueprint $table) {
            $table->bigIncrements('lv_id');
            $table->bigInteger('lns_id')->unsigned();
            $table->foreign('lns_id')->references('lns_id')->on('loaisanphamnuoitrong');
            $table->bigInteger('nd_id')->nullable()->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan');
            $table->bigInteger('tl_id')->nullable()->unsigned();
            $table->foreign('tl_id')->references('tl_id')->on('thuonglai');
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
        Schema::dropIfExists('linhvucquantam');
    }
}
