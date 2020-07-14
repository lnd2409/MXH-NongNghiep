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
                'nd_sdt' => '01237068434',
                'nd_hinhanh'=>'nd1.png',
                'nd_background'=>'bg11.jpg'
            ],
            [
                'username' => 'nongdan1',
                'password' => bcrypt('12345'),
                'nd_hoten' => 'Trần Thanh Phụng',
                'nd_diachi' => 'Cần Thơ',
                'nd_sdt' => '01237068434',
                'nd_hinhanh'=>'nd1.png',
                'nd_background'=>'bg12.jpg'
            ],
            [
                'username' => 'nongdan2',
                'password' => bcrypt('12345'),
                'nd_hoten' => 'Lê Minh Nghĩa',
                'nd_diachi' => 'Cần Thơ',
                'nd_sdt' => '01237068434',
                'nd_hinhanh'=>'nd1.png',
                'nd_background'=>'bg11.jpg'
            ],
        ];
        DB::table('nongdan')->insert($nongdan);

        //Thương lái

        $thuonglai = [
            [
                'username' => 'thuonglai1',
                'password' => bcrypt('12345'),
                'tl_hoten' => 'Lê Ngọc Đức',
                'tl_diachi' => 'Cần Thơ',
                'tl_sdt' => '01237068434',
                'tl_hinhanh'=>'nd1.png',
                'tl_background'=>'bg11.jpg'
            ],
            [
                'username' => 'thuonglai2',
                'password' => bcrypt('12345'),
                'tl_hoten' => 'Trần Thanh Phụng',
                'tl_diachi' => 'Cần Thơ',
                'tl_sdt' => '01237068434',
                'tl_hinhanh'=>'nd2.png',
                'tl_background'=>'bg13.jpg'
            ],
            [
                'username' => 'thuonglai3',
                'password' => bcrypt('12345'),
                'tl_hoten' => 'Lê Minh Nghĩa',
                'tl_diachi' => 'Cần Thơ',
                'tl_sdt' => '01237068434',
                'tl_hinhanh'=>'nd1.png',
                'tl_background'=>'bg14.jpg'
            ]
        ];
        DB::table('thuonglai')->insert($thuonglai);

        
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

        //Chuyên gia

        $chuyengia = [
            [
                'username' => 'chuyengia',
                'password' => bcrypt('12345'),
                'cg_hoten' => 'Dương Ngọc Tâm',
                'cg_diachi' => 'Cần Thơ',
                'cg_sdt' => '01237068434',
                'cg_hinhanh'=>'nd1.png',
                'cg_background'=>'bg11.jpg',
                'td_id'=>1
            ],
           
        ];
        DB::table('chuyengia')->insert($chuyengia);

        $loaisanpham = [
            [
                'lsp_ten' => 'Vật tư'
            ],
            [
                'lsp_ten' => 'Thuốc bảo vệ thực vật'
            ],
            [
                'lsp_ten' => 'Phân bón'
            ],
            [
                'lsp_ten' => 'Xẻng, cuốc'
            ],
        ];

        DB::table('loaisanpham')->insert($loaisanpham);


        $donvitinh = [
            [
                'dvt_ten' => 'Kilogram',
                'created_at' => $now,
                'updated_at' => $now
            ],

        ];
    }
}
