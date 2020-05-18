<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaivietTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baiviet', function (Blueprint $table) {
            $table->bigIncrements('bv_id');

            $table->string('bv_noidung');
            $table->date('bv_thoigian');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('cg_id')->unsigned();
            $table->foreign('cg_id')->references('cg_id')->on('chuyengia')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('tl_id')->unsigned();
            $table->foreign('tl_id')->references('tl_id')->on('thuonglai')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamps('create_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày tạo');
            $table->timestamps('update_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày cập nhật');
            $table->timestamps('delete_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày xóa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baiviet');
    }
}
