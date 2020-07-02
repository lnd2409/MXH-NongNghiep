<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanh', function (Blueprint $table) {
            $table->bigIncrements('ha_id');
            $table->string('ha_ten');
            $table->string('ha_duongdan');
            $table->bigInteger('spnt_id')->unsigned();
            $table->foreign('spnt_id')->references('spnt_id')->on('sanphamnuoitrong')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày tạo');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Ngày cập nhật');
            $table->timestamp('deleted_at')->nullable()->comment('Ngày xóa');
            $table->foreign('sp_id')->references('sp_id')->on('sanpham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanh');
    }
}
