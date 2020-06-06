<?php

use Illuminate\Database\Seeder;

class nccvt extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('nccvt')->insert([
            'nccvt_ten'=>'Lê Minh Nghĩa',
            'nccvt_tendangnhap'=>'lmnghia',
            'nccvt_matkhau'=>\Hash::make('lmnghia'),
            'nccvt_diachi'=>'Cần Thơ',
            'nccvt_sdt'=>'012456789'
        ]);
    }
}
