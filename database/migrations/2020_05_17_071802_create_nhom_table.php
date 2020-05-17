<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhom', function (Blueprint $table) {
            
            $table->bigIncrements('n_id');

            $table->string('n_tennhom');
            
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
        Schema::dropIfExists('nhom');
    }
}
