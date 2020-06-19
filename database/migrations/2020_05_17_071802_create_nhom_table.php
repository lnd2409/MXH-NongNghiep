<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhom', function (Blueprint $table) {
            
            $table->bigIncrements('n_id');

            $table->string('n_tennhom');
            
           
            $table->bigInteger('lns_id')->unsigned();
            $table->foreign('lns_id')->references('lns_id')->on('loaisanphamnuoitrong');

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
        Schema::dropIfExists('nhom');
    }
}
