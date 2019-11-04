<?php

use Illuminate\Database\Seeder;

class ThemNguoiChoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nguoi_choi')->insert
        ([
        	[
        		'ten_dang_nhap'=>'user1',
        		'mat_khau'=>Hash::make('123456'),
        		'email'=>'user1@gmail.com',
        		'hinh_dai_dien'=>'user1img.png',
        		'diem_cao_nhat'=>'100',
        		'credit'=>'200'
        	],
        	[
        		'ten_dang_nhap'=>'user2',
        		'mat_khau'=>Hash::make('123456'),
        		'email'=>'user2@gmail.com',
        		'hinh_dai_dien'=>'user2img.png',
        		'diem_cao_nhat'=>'10',
        		'credit'=>'5'
        	],
            [
                'ten_dang_nhap'=>'user3',
                'mat_khau'=>Hash::make('123456'),
                'email'=>'user3@gmail.com',
                'hinh_dai_dien'=>'user3img.png',
                'diem_cao_nhat'=>'250',
                'credit'=>'75'
            ],
            [
                'ten_dang_nhap'=>'user4',
                'mat_khau'=>Hash::make('123456'),
                'email'=>'user4@gmail.com',
                'hinh_dai_dien'=>'user4img.png',
                'diem_cao_nhat'=>'0',
                'credit'=>'125'
            ],
            [
                'ten_dang_nhap'=>'user5',
                'mat_khau'=>Hash::make('123456'),
                'email'=>'user5@gmail.com',
                'hinh_dai_dien'=>'user5img.png',
                'diem_cao_nhat'=>'50',
                'credit'=>'350'
            ]
        ]);
    }
}
