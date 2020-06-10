<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhanhbaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhbaiviet', function (Blueprint $table) {
            $table->bigIncrements('habv_id');
            $table->string('habv_duongdan');
            $table->string('habv_ten');
            $table->bigInteger('bv_id')->unsigned();
            $table->foreign('bv_id')->references('bv_id')->on('baiviet');
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
        Schema::dropIfExists('hinhanhbaiviet');
    }
}
