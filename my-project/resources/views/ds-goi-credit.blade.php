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
				$("#goi-credit-datatable").DataTable({
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
	use App\Http\Controllers\GoiCreditController;
	echo GoiCreditController::cleanup();  // Reset auto increment
?>

@section('main-content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Gói Credit</h4>

				<form action="{{ route('goi-credit/xu-li-them-moi') }}" method="POST">
                	@csrf
					<button type="button" class="btn btn-primary waves-effect waves-light"data-toggle="modal" data-target="#myModalThemMoi" id="open" style="margin-top:20px; margin-bottom:20px">Thêm Mới</button>
					<div class="modal fade" tabindex="-1" role="dialog" id="myModalThemMoi" >
				        <div class="modal-dialog modal-dialog-centered" role="document">
				            <div class="modal-content">
				                <div class="alert alert-danger" style="display:none"></div>
				                <div class="modal-header">
				                    <h5 class="modal-title">Thêm Mới Gói Credit</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                        <span aria-hidden="true">&times;</span>
				                    </button>
				                </div>
				                <div class="modal-body">
				                    <div class="row">
				                        <div class="form-group col-md-8">
                    						<label for="ten_goi">Tên Gói:</label>
					                        <input type="text" class="form-control" name="noi_dung" id="noi_dung" placeholder="Nhập vào tên gói">
					                         <label for="so_credit">Số Credit:</label>
					                        <input type="text" class="form-control" name="phuong_an_a" id="phuong_an_a" placeholder="Nhập vào số credit">
					                         <label for="so_tien">Số tiền:</label>
					                        <input type="text" class="form-control" name="phuong_an_b" id="phuong_an_b" placeholder="Nhập vào số tiền">
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
				<table id="linh-vuc-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th style="width: 50px">ID</th>
							<th>Tên gói</th>
							<th>Số credit</th>
							<th>Số tiền</th>
							<th>Thao tác</th>
						</tr>
					</thead>
					
					
					<tbody>
						@foreach ($goiCredit as $table)
						<tr>
							<td>{{ $table->id }}</td>
							<td>{{ $table->ten_goi }}</td>
							<td>{{ $table->credit }}</td>
							<td>{{ $table->so_tien }}</td>
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

								                    <h5 class="modal-title">Cập Nhật Gói Credit</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="ten_goi">Tên Gói:</label>
								                            <input type="text" class="form-control" name="ten_goi" id="ten_goi" value="{{ $table->ten_goi }}"></br>
								                        </div>
								                    </div>
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="so_credit">Số Credit</label>
								                            <input type="text" class="form-control" name="so_credit" id="so_credit" value="{{ $table->credit }}">
								                        </div>
								                    </div>
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="so_tien">Số Tiền:</label>
								                            <input type="text" class="form-control" name="so_tien" id="so_tien" value="{{ $table->so_tien }}">
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
								                    <h5 class="modal-title">Xóa Lĩnh Vực</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <h4 style="padding-left: 75px;">Bạn có muốn xóa gói credit {{$table->ten_goi}} ?</h4>
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