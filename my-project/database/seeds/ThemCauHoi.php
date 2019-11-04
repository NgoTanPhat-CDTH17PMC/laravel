<?php

use Illuminate\Database\Seeder;

class ThemCauHoi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cau_hoi')->insert
        ([
        	[
        		'noi_dung' => 'Nguyên nhân nào làm cho thiên nhiên Việt Nam khác hẳn với thiên nhiên các nước có cùng vĩ độ Tây Á, Đông Phi và Tây Phi?',
        		'linh_vuc_id' => '1',
        		'phuong_an_a' => 'Việt Nam nằm trong khu vực nhiệt đới gió mùa',
        		'phuong_an_b' => 'Việt Nam có bờ biển dài, khúc khuỷu',
        		'phuong_an_c' => 'Do đất nước hẹp ngang, trải dài trên nhiền vĩ độ',
        		'phuong_an_d' => 'Do cả 3 nguyên nhân',
        		'dap_an' => 'A'
        	],
        	[
        		'noi_dung' => 'Xu hướng quốc tế hóa và khu vực hóa nền kinh tế thế giới diễn ra với quy mô lớn và nhịp dộ cao là điều kiện để?',
        		'linh_vuc_id' => '1',
        		'phuong_an_a' => 'Nước ta tận dụng các nguồn lực bên ngoài để phát triển kinh tế xã hội',
        		'phuong_an_b' => 'Nước ta mở rộng buôn bán với nhiều nước trên thế giới',
        		'phuong_an_c' => 'Nước ta bộc lộ những hạn chế về vốn, công nghệ trong quá trình phát triển sản xuất',
        		'phuong_an_d' => 'Tất cả các điều kiện trên',
        		'dap_an' => 'A'
        	],
        	[
        		'noi_dung' => 'Những trở ngại chính đối với việc phát triển kinh tế xã hội ở nước ta về TNTN là?',
        		'linh_vuc_id' => '1',
        		'phuong_an_a' => 'Trữ lượng ít',
        		'phuong_an_b' => 'Số lượng nhiều, trữ lượng nhỏ lại phân tán',
        		'phuong_an_c' => 'Ít loại có giá trị',
        		'phuong_an_d' => 'TNTN đang bị suy thoái nghiêm trọng',
        		'dap_an' => 'B'
        	],
        	[
        		'noi_dung' => 'Tài nguyên giữ vị trí quan trọng nhất Việt Nam hiện nay là?',
        		'linh_vuc_id' => '1',
        		'phuong_an_a' => 'Tài nguyên đất',
        		'phuong_an_b' => 'Tài nguyên sinh vật',
        		'phuong_an_c' => 'Tài nguyên nước',
        		'phuong_an_d' => 'Tài nguyên khoáng sản',
        		'dap_an' => 'A'
        	],
        	[
        		'noi_dung' => 'Tài nguyên có ý nghĩa đặc biệt dối với sự phát triển kinh tế xã hội Việt Nam hiện nay là?',
        		'linh_vuc_id' => '1',
        		'phuong_an_a' => 'Tài nguyên đất',
        		'phuong_an_b' => 'Tài nguyên nước',
        		'phuong_an_c' => 'Tài nguyên sinh vật',
        		'phuong_an_d' => 'Tài nguyên khoáng sản',
        		'dap_an' => 'D'
        	],
        	[
        		'noi_dung' => 'Khó khăn lớn nhất của đất nước ta sau cách mạng tháng Tám gì?',
        		'linh_vuc_id' => '2',
        		'phuong_an_a' => 'Các kẻ thù ngoại xâm, nội phản',
        		'phuong_an_b' => 'Nạn đói, nạn dốt đe doạ nghiêm trọng cuộc sống của nhân dân ta',
        		'phuong_an_c' => 'Ngân quỹ nhà nước trống rỗng',
        		'phuong_an_d' => 'Các tổ chức phản cách mạng ra sức chống phá cách mạng',
        		'dap_an' => 'A'
        	],
        	[
        		'noi_dung' => 'Quân đội Đồng minh các nước vào nước ta sau năm 1945 là?',
        		'linh_vuc_id' => '2',
        		'phuong_an_a' => 'Quân Anh, quân Mĩ',
        		'phuong_an_b' => 'Quân Pháp, quân Anh',
        		'phuong_an_c' => 'Quân Anh, quân Trung Hoa Dân quốc',
        		'phuong_an_d' => 'Quân Pháp, quân Trung Hoa Dân quốc',
        		'dap_an' => 'C'
        	],
        	[
        		'noi_dung' => 'Sau cách mạng tháng 8 năm 1945, chúng ta phải đối mặt với nhiều kẻ thù, trong đó nguy hiểm nhất là?',
        		'linh_vuc_id' => '2',
        		'phuong_an_a' => 'Quân Trung Hoa Dân Quốc',
        		'phuong_an_b' => 'Thực dân Pháp',
        		'phuong_an_c' => 'Đế quốc Anh',
        		'phuong_an_d' => 'Phát xít Nhật',
        		'dap_an' => 'B'
        	],
        	[
        		'noi_dung' => 'Quân Trung Hoa Dân quốc và tay sai của chúng ở miền Bắc có âm mưu gì?',
        		'linh_vuc_id' => '2',
        		'phuong_an_a' => 'Giải giáp khí giới quân Nhật.',
        		'phuong_an_b' => 'Giúp đỡ chính quyền cách mạng nước ta.',
        		'phuong_an_c' => 'Đánh quân Anh.',
        		'phuong_an_d' => 'Cướp chính quyền của ta.',
        		'dap_an' => 'D'
        	],
        	[
        		'noi_dung' => 'Khó khăn nghiêm trọng nhất của nước Việt Nam Dân chủ Cộng hòa sau Cách mạng tháng Tám năm 1945 là?',
        		'linh_vuc_id' => '2',
        		'phuong_an_a' => 'Nạn đói.',
        		'phuong_an_b' => 'Giặc dốt.',
        		'phuong_an_c' => 'Tài chính.',
        		'phuong_an_d' => 'Giặc ngoại xâm.',
        		'dap_an' => 'D'
        	]
        ]);
    }
}
