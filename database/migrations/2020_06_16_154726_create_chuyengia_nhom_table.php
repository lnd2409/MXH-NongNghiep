<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChuyengiaNhomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyengianhom', function (Blueprint $table) {
            $table->bigIncrements('cgn_id');
            $table->bigInteger('cg_id')->unsigned();
            $table->foreign('cg_id')->references('cg_id')->on('chuyengia');
            $table->bigInteger('n_id')->unsigned();
            $table->foreign('n_id')->references('n_id')->on('nhom');
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
        Schema::dropIfExists('chuyengianhom');
    }
}
