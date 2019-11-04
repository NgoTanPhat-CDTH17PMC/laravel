<?php

use Illuminate\Database\Seeder;

class ThemGoiCredit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('goi_credit')->insert
        ([
        	[
        		'ten_goi' => 'Dân thường',
                'credit' => '500',
                'so_tien' => '20000'
        	],
        	[
        		'ten_goi' => 'Dân chơi',
                'credit' => '1000',
                'so_tien' => '15000'
        	],
            [
                'ten_goi' => 'Rich kid',
                'credit' => '5000',
                'so_tien' => '150000'
            ],
            [
                'ten_goi' => 'Đại gia',
                'credit' => '10000',
                'so_tien' => '250000'
            ],
            [
                'ten_goi' => 'Khá Bảnh',
                'credit' => '50000',
                'so_tien' => '1250000'
            ]
        ]);
    }
}
