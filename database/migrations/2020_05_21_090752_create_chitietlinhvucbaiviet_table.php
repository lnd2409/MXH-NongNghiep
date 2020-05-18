<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietlinhvucbaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietlinhvucbaiviet', function (Blueprint $table) {
            $table->bigIncrements('ctlvbv_id');
            $table->bigInteger('lns_id')->unsigned();
            $table->bigInteger('bv_id')->unsigned();

            $table->foreign('lns_id')->references('lns_id')->on('loaisanphamnuoitrong');
            $table->foreign('bv_id')->references('bv_id')->on('baiviet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('chitietlinhvucbaiviet');
    }
}
