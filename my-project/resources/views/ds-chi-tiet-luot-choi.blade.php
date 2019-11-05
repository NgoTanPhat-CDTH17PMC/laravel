<!-- Phat --> 
@extends('layout')
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
		$("#chi-tiet-luot-choi-datatable").DataTable({
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
	use App\Http\Controllers\CauHoiConTroller;
	echo CauHoiController::cleanup();  // Reset auto increment
?>


@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Chi Tiết Lượt Chơi</h4>
				
				<table id="chi-tiet-luot-choi-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Lượt chơi</th>
							<th>Câu hỏi</th>
							<th>Phương án</th>
							<th>Điểm</th>
							<th>Thao tác</th>
							<!-- 
							<th>Phương Án A</th>
							<th>Phương Án B</th>
							<th>Phương Án C</th>
							<th>Phương Án D</th>
							<th>Đáp Án</th> -->
						</tr>
					</thead>
					<tbody>
						@foreach ($chiTietLuotChoi as $table)
						<tr>
							<td>
								{{ $table->id }}
							</td>
							<td>
								<p>{{ $table->luot_choi_id }} </p>
							</td>
							<td>
								<p>{{ $table->cau_hoi_id }} </p>
							</td>
							<td>
								<p>{{ $table->phuong_an }} </p>
							</td>
							<td>
								<p>{{ $table->Diem }} </p>
							</td>
							<td>
								<a href="cap-nhat-1/{{$table->id}}" style="float:left"><button type="button" class="btn btn-info btn-rounded waves-effect waves-light">Cập nhật</button></a>
								<form method="POST" action="xoa/{{$table->id}}" style="float:left" >
									@method('DELETE')
									@csrf
									<button type="submit" onclick="return confirm('Bạn có muốn xóa?')" class="btn btn-danger btn-rounded waves-effect waves-light" >Xóa</button>
								</form>	
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