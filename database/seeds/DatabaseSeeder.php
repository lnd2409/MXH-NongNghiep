<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $nongdan = [
            [
                'username' => 'ngocduc',
                'password' => bcrypt('12345'),
                'nd_hoten' => 'Lê Ngọc Đức',
                'nd_diachi' => 'Cần Thơ',
                'nd_sdt' => '01237068434'
            ]
        ];
        DB::table('nongdan')->insert($nongdan);

        //Dữ liệu mẫu cho Nhóm
        $now = Carbon::now();
        

        //Dữ liệu cho loại nông sản
        $loaisanphamnuoitrong = [
            [
                'lns_ten' => 'Cây ăn trái',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'lns_ten' => 'Cây lấy gỗ',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'lns_ten' => 'Cây lương thực',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'lns_ten' => 'Hoa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'lns_ten' => 'Thủy hải sản',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'lns_ten' => 'Gia cầm - Gia súc',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];
        DB::table('loaisanphamnuoitrong')->insert($loaisanphamnuoitrong);


        $trinhdochuyengia = [
            [
                'td_ten' => 'Kỹ sư'
            ],
            [
                'td_ten' => 'Thạc sĩ'
            ],
            [
                'td_ten' => 'Tiến sĩ'
            ],
            [
                'td_ten' => 'Phó giáo sư - Tiến sĩ'
            ],
            [
                'td_ten' => 'Giáo sư'
            ],
        ];

        DB::table('trinhdo')->insert($trinhdochuyengia);
    }
}
