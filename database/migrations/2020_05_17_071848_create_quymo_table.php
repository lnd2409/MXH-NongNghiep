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
           $table->string('qm_soluongnongsan');

           $table->bigInteger('spnt_id')->unsigned();
           $table->foreign('spnt_id')->references('spnt_id')->on('spnuoitrong')->onDelete('CASCADE')->onUpdate('CASCADE');

           $table->bigInteger('dvt_id')->unsigned();
           $table->foreign('dvt_id')->references('dvt_id')->on('donvitinh')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('nd_id')->unsigned();
            $table->foreign('nd_id')->references('nd_id')->on('nongdan')->onDelete('CASCADE')->onUpdate('CASCADE');


            $table->primary(['spnt_id','dvt_id','nd_id']);
           

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
        Schema::dropIfExists('quymo');
    }
}
