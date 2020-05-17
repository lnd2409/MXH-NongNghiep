<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonvitinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvitinh', function (Blueprint $table) {
            $table->bigIncrements('dv_id');
            $table->string('dvt_loai');

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
        Schema::dropIfExists('donvitinh');
    }
}
