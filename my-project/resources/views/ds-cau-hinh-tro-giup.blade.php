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
				$("#cau-hinh-tro-giup-datatable").DataTable({
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
	use App\Http\Controllers\CauHinhTroGiupController;
	echo CauHinhTroGiupController::cleanup();  // Reset auto increment
?>

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Cấu Hình Trợ Giúp</h4>
				<a  href="{{ route('cau-hinh-tro-giup/them-moi') }}">
					<button type="button" class="btn btn-primary waves-effect waves-light" style="margin-top:20px; margin-bottom:20px">Thêm Mới</button>
				</a>
				<a  href="cap-nhat-n">
					<button type="button" class="btn btn-primary waves-effect waves-light" style="margin-left:20px; margin-right:20px">Cập nhật</button>
				</a>
				<a  href="#">
					<button type="button" class="btn btn-primary waves-effect waves-light">Xóa</button>
				</a>
				<table id="cau-hinh-tro-giup-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Loại trợ giúp</th>
							<th>Thứ tự</th>
							<th>Credit</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($cauHinhTroGiup as $table)
						<tr>
							<td>{{ $table->id }}</td>
							<td>{{ $table->loai_tro_giup }}</td>
							<td>{{ $table->thu_tu }}</td>
							<td>{{ $table->credit}}</td>
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