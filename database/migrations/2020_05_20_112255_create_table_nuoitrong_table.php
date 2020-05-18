<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNuoitrongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nuoitrong', function (Blueprint $table) {
            $table->bigInteger('nt_sanluongdutinh');
            $table->bigInteger('nt_sanluongthucte');
           
            $table->bigInteger('mv_id')->unsigned();
            $table->foreign('mv_id')->references('mv_id')->on('muavu')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->bigInteger('spnt_id')->unsigned();
            $table->foreign('spnt_id')->references('spnt_id')->on('sanphamnuoitrong')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('nuoitrong');
    }
}
