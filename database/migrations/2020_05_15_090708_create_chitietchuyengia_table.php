<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietchuyengiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietchuyengia', function (Blueprint $table) {
            $table->integer('n_id');
            $table->integer('cg_id');

            $table->foreign('n_id')->references('n_id')->on('nhom');
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
        // Schema::dropIfExists('chitietchuyengia');
    }
}
