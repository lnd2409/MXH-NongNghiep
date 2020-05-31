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
        //Dữ liệu mẫu cho Nhóm
        $now = Carbon::now();
        $nhom = [
            [
                'n_tennhom' => 'Nhóm trồng cam',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'n_tennhom' => 'Nhóm trồng sầu riêng',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'n_tennhom' => 'Nhóm trồng mít',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'n_tennhom' => 'Nhóm trồng chanh',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'n_tennhom' => 'Nhóm trồng dừa',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'n_tennhom' => 'Nhóm nuôi heo',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'n_tennhom' => 'Nhóm nuôi gà',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ];
        DB::table('nhom')->insert($nhom);
    }
}
