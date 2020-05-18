<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoaisanhamnuoitrongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanphamnuoitrong', function (Blueprint $table) {
            $table->increments('lns_id');
            $table->string('lns_ten');
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
        Schema::dropIfExists('loaisanphamnuoitrong');
    }
}
