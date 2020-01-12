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
				<form action="{{ route('cau-hinh-tro-giup/xu-li-them-moi') }}" method="POST">
                	@csrf
					<button type="button" class="btn btn-primary waves-effect waves-light"data-toggle="modal" data-target="#myModalThemMoi" id="open" style="margin-top:20px; margin-bottom:20px">Thêm Mới</button>
					<div class="modal fade" tabindex="-1" role="dialog" id="myModalThemMoi" >
				        <div class="modal-dialog modal-dialog-centered" role="document">
				            <div class="modal-content">
				                <div class="alert alert-danger" style="display:none"></div>
				                <div class="modal-header">
				                    <h5 class="modal-title">Thêm Mới Cấu Hình Trợ Giúp</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                        <span aria-hidden="true">&times;</span>
				                    </button>
				                </div>
				                <div class="modal-body">
				                    <div class="row">
				                        <div class="form-group col-md-8">
                    						<label for="loai_tro_giup">Loại Trợ Giúp: </label>
					                        <input type="text" class="form-control" name="loai_tro_giup" id="loai_tro_giup" placeholder="Nhập vào loại trợ giúp">
					                        <label for="thu_tu">Thứ Tự: </label>
					                        <input type="text" class="form-control" name="thu_tu" id="thu_tu" placeholder="Nhập vào thứ tự">
					                        <label for="credit">Credit: </label>
					                        <input type="text" class="form-control" name="credit" id="credit" placeholder="Nhập vào số credit">
				                        </div>
				                    </div>
				                </div>
				                <div class="modal-footer">
				                    <button  class="btn btn-success" id="ajaxSubmit">Thêm mới</button>
				                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
				                </div>
				            </div>
				        </div>
				    </div>
				</form>
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
								<form action="cap-nhat/{{ $table->id }}" method="POST" id="form" style="float:left">
								    @method('PATCH')
								    @csrf
								  	<button type="button" class="btn btn-info btn-rounded waves-effect waves-light" 
									data-toggle="modal" data-target="#myModalCapNhat{{$table->id}}" id="open">Cập nhật</button>
								    <div class="modal fade" tabindex="-1" role="dialog" id="myModalCapNhat{{$table->id}}">
								        <div class="modal-dialog modal-dialog-centered" role="document">
								            <div class="modal-content">
								                <div class="alert alert-danger" style="display:none"></div>
								                <div class="modal-header">

								                    <h5 class="modal-title">Cập Nhật Cấu Hình Trợ Giúp</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="loai_tro_giup">Loại Trợ Giúp</label>
								                            <input type="text" class="form-control" name="loai_tro_giup" id="loai_tro_giup" value="{{ $table->loai_tro_giup }}"></br>
								                        </div>
								                    </div>
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="thu_tu">Thứ Tự:</label>
								                            <input type="text" class="form-control" name="thu_tu" id="thu_tu" value="{{ $table->thu_tu }}">
								                        </div>
								                    </div>
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="credit">Số Credit:</label>
								                            <input type="text" class="form-control" name="credit" id="credit" value="{{ $table->credit }}">
								                        </div>
								                    </div>
								                </div>
								                <div class="modal-footer">
								                    
								                    <button  class="btn btn-success" id="ajaxSubmit">Lưu thay đổi</button>
								                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
								                </div>
								            </div>
								        </div>
								    </div>
								</form>

								<form method="POST" action="xoa/{{$table->id}}" style="float:left" >
									@method('DELETE')
									@csrf
									<button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#myModalXoa{{$table->id}}" id="open">Xóa</button>
									<div class="modal fade" tabindex="-1" role="dialog" id="myModalXoa{{$table->id}}">
								        <div class="modal-dialog modal-dialog-centered" role="document">
								            <div class="modal-content">
								                <div class="alert alert-danger" style="display:none"></div>
								                <div class="modal-header">
								                    <h5 class="modal-title">Xóa Cấu Hình Trợ Giúp</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <h4 style="padding-left: 75px;">Bạn có muốn xóa cấu hình này?</h4>
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