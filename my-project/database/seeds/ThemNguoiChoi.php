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
                'ho_ten' =>'Nguyễn Văn Diu Sơ 1',
                'ngay_sinh' =>'05-09-1988',
                'so_dien_thoai'=>'0983965481',
        		'diem_cao_nhat'=>'100',
        		'credit'=>'200'
        	],
        	[
        		'ten_dang_nhap'=>'user2',
        		'mat_khau'=>Hash::make('123456'),
        		'email'=>'user2@gmail.com',
                'ho_ten' =>'Nguyễn Văn Diu Sơ 2',
                'ngay_sinh' =>'15-12-1999',
                'so_dien_thoai'=>'0986436978',
        		'diem_cao_nhat'=>'10',
        		'credit'=>'5'
        	],
            [
                'ten_dang_nhap'=>'user3',
                'mat_khau'=>Hash::make('123456'),
                'email'=>'user3@gmail.com',
                'ho_ten' =>'Nguyễn Văn Diu Sơ 3',
                'ngay_sinh' =>'06-01-2003',
                'so_dien_thoai'=>'0987654321',
                'diem_cao_nhat'=>'250',
                'credit'=>'75'
            ],
            [
                'ten_dang_nhap'=>'user4',
                'mat_khau'=>Hash::make('123456'),
                'email'=>'user4@gmail.com',
                'ho_ten' =>'Nguyễn Văn Diu Sơ 4',
                'ngay_sinh' =>'19-05-1985',
                'so_dien_thoai'=>'0926578965',
                'diem_cao_nhat'=>'0',
                'credit'=>'125'
            ],
            [
                'ten_dang_nhap'=>'user5',
                'mat_khau'=>Hash::make('123456'),
                'email'=>'user5@gmail.com',
                'ho_ten' =>'Nguyễn Văn Diu Sơ 5',
                'ngay_sinh' =>'02-02-1995',
                'so_dien_thoai'=>'0832698654',
                'diem_cao_nhat'=>'50',
                'credit'=>'350'
            ]
        ]);
    }
}
