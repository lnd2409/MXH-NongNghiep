<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMuavuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('muavu', function (Blueprint $table) {
            $table->bigIncrements('mv_id')->unsigned();
            $table->timestamps();

            $table->bigInteger('mv_thangbatdau');
            $table->bigInteger('mv_thangketthuc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('muavu');
    }
}
