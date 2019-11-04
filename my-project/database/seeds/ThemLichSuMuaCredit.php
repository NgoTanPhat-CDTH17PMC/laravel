<?php

use Illuminate\Database\Seeder;

class ThemLichSuMuaCredit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('lich_su_mua_credit')->insert
        ([
        	[
        		'nguoi_choi_id'=>'1',
        		'goi_credit_id'=>'1',
        		'credit'=>'50',
        		'so_tien'=>'51000'
        	],
        	[
        		'nguoi_choi_id'=>'2',
        		'goi_credit_id'=>'2',
        		'credit'=>'100',
        		'so_tien'=>'101000'
        	]
        ]);
    }
}
