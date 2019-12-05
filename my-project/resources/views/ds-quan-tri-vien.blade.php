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
				$("#quan-tri-vien-datatable").DataTable({
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


@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Quản Trị Viên</h4>
				<form action="{{ route('quan-tri-vien/xu-li-them-moi') }}" method="POST">
                	@csrf
					<button type="button" class="btn btn-primary waves-effect waves-light"data-toggle="modal" data-target="#myModalThemMoi" id="openthem" style="margin-top:20px; margin-bottom:20px">Thêm Mới</button>
					<div class="modal fade" tabindex="-1" role="dialog" id="myModalThemMoi" >
				        <div class="modal-dialog modal-dialog-centered" role="document">
				            <div class="modal-content">
				                <div class="alert alert-danger" style="display:none"></div>
				                <div class="modal-header">
				                    <h5 class="modal-title">Thêm Mới Quản Trị Viên</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                        <span aria-hidden="true">&times;</span>
				                    </button>
				                </div>
				                <div class="modal-body">
				                    <div class="row">
				                        <div class="form-group col-md-8">

				                            <label for="ten_dang_nhap">Tên đăng nhập </label>				                            
                    						<input type="text" class="form-control" name="ten_dang_nhap" id="ten_dang_nhap" placeholder="Nhập vào tên đăng nhập">

                    						<label for="mat_khau">Mật khẩu </label>
                    						<input type="password" class="form-control" name="mat_khau" id="mat_khau" placeholder="Nhập vào mật khẩu">

                    						<label for="mat_khau">Nhập lại mật khẩu </label>
                    						<input type="password" class="form-control" name="nhap_lai_mat_khau" id="nhap_lai_mat_khau" placeholder="Nhập lại mật khẩu">

 											<label for="ho_ten">Họ tên </label>
                    						<input type="text" class="form-control" name="ho_ten" id="ho_ten" placeholder="Nhập vào họ tên">
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

				<table id="quan-tri-vien-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th >ID</th>
							<th>Tên đăng nhập</th>
							<th>Họ tên</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($quanTriVien as $table)
						<tr>
							<td>{{ $table->id }}</td>
							<td>{{ $table->ten_dang_nhap }}</td>
							<td>{{ $table->ho_ten }}</td>
							
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

								                    <h5 class="modal-title">Cập Nhật Quản Trị Viên</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                	<div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="ho_ten">Họ tên</label>
								                            <input type="text" class="form-control" name="ho_ten" id="ho_ten" value="{{ $table->ho_ten }}">
								                        </div>
								                    </div>
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="mat_khau_cu">Mật khẩu cũ</label>
								                            <input type="password" class="form-control" name="mat_khau_cu" id="mat_khau_cu" placeholder="Nhập vào mật khẩu cũ">
								                        </div>
								                    </div>
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="mat_khau_moi">Mật khẩu mới</label>
								                            <input type="password" class="form-control" name="mat_khau_moi" id="mat_khau_moi" placeholder="Nhập vào mật khẩu mới">
								                        </div>
								                    </div>

								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="mat_khau_moi">Nhập lại mật khẩu mới</label>
								                            <input type="password" class="form-control" name="nhap_lai_mat_khau_moi" id="nhap_lai_mat_khau_moi" placeholder="Nhập lại mật khẩu mới">
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
									<button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#myModalXoa{{$table->id}}" id="open">Khoá</button>
									<div class="modal fade" tabindex="-1" role="dialog" id="myModalXoa{{$table->id}}">
								        <div class="modal-dialog modal-dialog-centered" role="document">
								            <div class="modal-content">
								                <div class="alert alert-danger" style="display:none"></div>
								                <div class="modal-header">
								                    <h5 class="modal-title">Khoá Tài Khoản Quản Trị Viên</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <h4 style="padding-left: 75px;">Bạn có muốn khoá tài khoản của quản trị viên {{$table->ten_dang_nhap}} ?</h4>
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