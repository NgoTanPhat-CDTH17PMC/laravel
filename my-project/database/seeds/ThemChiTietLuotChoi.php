<?php

use Illuminate\Database\Seeder;

class ThemChiTietLuotChoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chi_tiet_luot_choi')->insert
        ([
        	[
        		'luot_choi_id' => '1',
                'cau_hoi_id' => '1',
                'phuong_an' => 'A',
                'diem' => '100'
        	],
        	[
        		'luot_choi_id' => '1',
                'cau_hoi_id' => '2',
                'phuong_an' => 'C',
                'diem' => '0'
        	],
        	[
        		'luot_choi_id' => '1',
                'cau_hoi_id' => '4',
                'phuong_an' => 'A',
                'diem' => '100'
        	],
        	[
        		'luot_choi_id' => '2',
                'cau_hoi_id' => '1',
                'phuong_an' => 'A',
                'diem' => '100'
        	]
        ]);
    }
}
