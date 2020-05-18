<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietnhomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietnhom', function (Blueprint $table) {
            $table->bigIncrements('ctn_id');
            $table->bigInteger('n_id')->unsigned();
            $table->bigInteger('nd_id')->unsigned();

            $table->foreign('n_id')->references('n_id')->on('nhom');
            $table->foreign('nd_id')->references('nd_id')->on('nongdan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('chitietnhom');
    }
}
