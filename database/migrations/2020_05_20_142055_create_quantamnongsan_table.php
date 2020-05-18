<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantamnongsanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantamnongsan', function (Blueprint $table) {

            $table->bigInteger('spnt_id')->unsigned();
            $table->foreign('spnt_id')->references('spnt_id')->on('sanphamnuoitrong')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->bigInteger('tl_id')->unsigned();
            $table->foreign('tl_id')->references('tl_id')->on('thuonglai')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string('qtns_quymo');
            
            //tao khoa chinh
            $table->primary(['spnt_id','tl_id']);

             $table->timestamp('created_at')
             ->default(DB::raw('CURRENT_TIMESTAMP'))
             ->comment('ngày tạo');

             $table->timestamp('updated_at')
             ->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
             ->comment('ngày cập nhật');

             $table->timestamp('deleted_at')
             ->nullable()
             ->comment('ngày xóa tạm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantamnongsan');
    }
}
