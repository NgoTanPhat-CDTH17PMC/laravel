@extends ('layout')
@section('css')
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
<script type="text/javascript">
			$(document).ready(function() {
				$("#linh-vuc-datatable").DataTable({
			language: {
			paginate: {
			previous: "<i class='mdi mdi-chevron-left'>",
			next: "<i class='mdi mdi-chevron-right'>"
			}
			},
			drawCallback: function() {
			$(".dataTables_paginate > .pagination").addClass("pagination-rounded")
			}
			});
			});
</script>
@endsection

<?php 
	use App\Http\Controllers\LuotChoiController;
	echo LuotChoiController::cleanup();  // Reset auto increment


	function Alert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}
?>

@section('main-content')

<!-- Thanh thong bao -->
@if (session('deleted'))
	<?php
		Alert("Xóa thành công!");		
	?>
@endif

@if (session('updated'))
 	<?php
		Alert("Cập nhật thành công!");		
	?>
@endif

@if (session('added'))
 	<?php
		Alert("Thêm mới thành công!");		
	?>
@endif

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Lượt Chơi</h4>
				<table id="luot-choi-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th style="width: 50px">ID</th>
							<th>ID người chơi</th>
							<th>Tên người chơi</th>
							<th>Số đáp án đúng</th>
							<th>Tổng điểm</th>
							<th>Ngày, giờ chơi</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($luotChoi as $table)
						<?php
							$nguoiChoi = DB::table('nguoi_choi')->where('id', $table->nguoi_choi_id)->get();
						?>
						<tr>
							<td>{{ $table->id }}</td>
							<td>{{ $table->nguoi_choi_id }}</td>
							<td>{{ $nguoiChoi[0]->ten_dang_nhap }}</td>
							<td>{{ $table->so_cau }}</td>
							<td>{{ $table->diem }}</td>
							<td>{{ $table->ngay_gio }}</td>
							<td>
								<a href="chi-tiet-luot-choi/{{$table->id}}" style="float:left"><button type="button" class="btn btn-info btn-rounded waves-effect waves-light">Xem chi tiết lượt chơi</button></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div> <!-- end card body-->
		</div> <!-- end card -->
	</div><!-- end col-->
</div>
			<!-- end row-->
			@endsection