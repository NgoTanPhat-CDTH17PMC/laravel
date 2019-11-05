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
				$("#nguoi-choi-datatable").DataTable({
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
	use App\Http\Controllers\NguoiChoiController;
	echo NguoiChoiController::cleanup();  // Reset auto increment
?>

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Người Chơi</h4>
				<a  href="{{ route('nguoi-choi/them-moi') }}">
					<button type="button" class="btn btn-primary waves-effect waves-light" style="margin-top:20px; margin-bottom:20px">Thêm Mới</button>
				</a>

				<br>

				<table id="nguoi-choi-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Tên đăng nhập</th>
							<th>Mật khẩu</th>
							<th>Email</th>
							<th>Hình đại diện</th>
							<th>Điểm cao nhất</th>
							<th>Credit</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($nguoiChoi as $table)
						<tr>
							<td>{{ $table->id }}</td>
							<td>{{ $table->ten_dang_nhap }}</td>
							<td>{{ $table->mat_khau }}</td>
							<td>{{ $table->email }}</td>
							<td>{{ $table->hinh_dai_dien }}</td>
							<td>{{ $table->diem_cao_nhat }}</td>
							<td>{{ $table->credit }}</td>
							
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