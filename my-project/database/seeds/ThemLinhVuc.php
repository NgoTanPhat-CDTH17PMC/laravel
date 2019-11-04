<?php

use Illuminate\Database\Seeder;

class ThemLinhVuc extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('linh_vuc')->insert
        ([
        	[
        		'id'=>'1',
        		'ten'=>'Địa Lý'
        	],
        	[
        		'id'=>'2',
        		'ten'=>'Lịch Sử'
        	],
        	[
        		'id'=>'3',
        		'ten'=>'Thể Thao'
        	],
        	[
        		'id'=>'4',
        		'ten'=>'Âm Nhạc'
        	],
        	[
        		'id'=>'5',
        		'ten'=>'Văn Học'
        	],
        ]);
    }
}
