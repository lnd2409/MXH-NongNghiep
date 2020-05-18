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
            $table->integer('lns_id');
            $table->integer('bv_tieude');

            $table->foreign('lns_id')->references('lns_id')->on('loaispnuoitrong');
            $table->foreign('bv_tieude')->references('cg_bv_tieudeid')->on('baiviet');
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
