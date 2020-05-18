<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhatkynonghoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhatkynongho', function (Blueprint $table) {
            $table->bigIncrements('nknh_id');
            $table->string('nknh_noidung');
            $table->date('nknh_ngayviet');

            $table->bgInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan')->onDelete('CASCADE')->onUpdate('CASCADE');

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
        Schema::dropIfExists('nhatkynongho');
    }
}
