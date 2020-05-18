<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietlinhvucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietlinhvuc', function (Blueprint $table) {
            $table->integer('lns_id');
            $table->integer('cg_id');

            $table->foreign('lns_id')->references('lns_id')->on('loaispnuoitrong');
            $table->foreign('cg_id')->references('cg_id')->on('chuyengia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('chitietlinhvuc');
    }
}
