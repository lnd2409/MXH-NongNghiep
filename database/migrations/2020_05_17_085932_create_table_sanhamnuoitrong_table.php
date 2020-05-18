<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSanhamnuoitrongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanphamnuoitrong', function (Blueprint $table) {
            $table->bigIncrements('spnt_id');
            $table->string('spnt_ten');
            $table->string('spnt_thongtin');
            $table->bigInteger('lns_id')->unsigned();
            $table->foreign('lns_id')->references('lns_id')->on('loaisanphamnuoitrong');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày tạo');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('Ngày cập nhật');
            $table->timestamp('deleted_at')->nullable()->comment('Ngày xóa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanphamnuoitrong');
    }
}
