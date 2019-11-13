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

				<br>

				<table id="nguoi-choi-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th style="display: none">ID</th>
							<th style="display: none; width:20%">Tên đăng nhập</th>
							<th style="display: none; width:20%">Email</th>
							<th style="display: none; width:20%">Hình đại diện</th>
							<th style="display: none; width:20%">Điểm cao nhất</th>
							<th style="display: none">Credit</th>
							<th style="display: none">Thao tác</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($nguoiChoi as $table)
						<tr>
							<td>{{ $table->id }}</td>
							<td>{{ $table->ten_dang_nhap }}</td>
							<td>{{ $table->email }}</td>
							<td>{{ $table->hinh_dai_dien }}</td>
							<td>{{ $table->diem_cao_nhat }}</td>
							<td>{{ $table->credit }}</td>
							
							<td>
								<form method="POST" action="xoa/{{$table->id}}" style="float:left" >
									@method('DELETE')
									@csrf
									<button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#myModalXoa{{$table->id}}" id="open">Xóa</button>
									<div class="modal fade" tabindex="-1" role="dialog" id="myModalXoa{{$table->id}}">
								        <div class="modal-dialog modal-dialog-centered" role="document">
								            <div class="modal-content">
								                <div class="alert alert-danger" style="display:none"></div>
								                <div class="modal-header">
								                    <h5 class="modal-title">Xóa Người Chơi</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <h4 style="padding-left: 75px;">Bạn có muốn xóa người chơi {{$table->ten_dang_nhap}} ?</h4>
								                    </div>
								                </div>
								                <div class="modal-footer">
								                    
								                    <button  class="btn btn-success" id="ajaxSubmit">Đồng Ý</button>
								                    <button type="button" class="btn btn-danger" data-dismiss="modal">Từ Chối</button>
								                </div>
								            </div>
								        </div>
								    </div>
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