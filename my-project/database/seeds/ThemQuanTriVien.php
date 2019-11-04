<?php

use Illuminate\Database\Seeder;

class ThemQuanTriVien extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quan_tri_vien')->insert
        ([
        	[
        		'ten_dang_nhap'=>'admin1',
        		'mat_khau'=>Hash::make('123456'),
        		'ho_ten'=>'QTV 1'
        	],
        	[
        		'ten_dang_nhap'=>'admin2',
        		'mat_khau'=>Hash::make('123456'),
        		'ho_ten'=>'QTV 2'
        	]
        ]);
    }
}
