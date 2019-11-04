<?php

use Illuminate\Database\Seeder;

class ThemLuotChoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('luot_choi')->insert
        ([
        	[
        		'nguoi_choi_id' => '1',
        		'so_cau' => '3',
        		'diem' => '300',
        		'ngay_gio' => '2019/01/01'
        	],
        	[
        		'nguoi_choi_id' => '2',
        		'so_cau' => '4',
        		'diem' => '400',
        		'ngay_gio' => '2019/01/02'
        	],
        ]);
    }
}
