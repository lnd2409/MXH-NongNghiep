<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuymoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quymo', function (Blueprint $table) {
           $table->integer('qm_soluongnongsan');

           $table->bigInteger('spnt_id')->unsigned();
           $table->foreign('spnt_id')->references('spnt_id')->on('sanphamnuoitrong')->onDelete('CASCADE')->onUpdate('CASCADE');

           $table->bigInteger('dvt_id')->unsigned();
           $table->foreign('dvt_id')->references('dvt_id')->on('donvitinh')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan')->onDelete('CASCADE')->onUpdate('CASCADE');


            $table->primary(['spnt_id','dvt_id','nd_id']);
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
        Schema::dropIfExists('quymo');
    }
}
