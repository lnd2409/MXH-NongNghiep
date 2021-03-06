<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNccvtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nccvt', function (Blueprint $table) {
            $table->bigIncrements('nccvt_id')->unsigned();
            $table->string('nccvt_ten');
            $table->string('username');
            $table->string('password');
            $table->string('nccvt_diachi');
            $table->string('nccvt_sdt');
            $table->rememberToken();
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
        Schema::dropIfExists('nccvt');
    }
}
