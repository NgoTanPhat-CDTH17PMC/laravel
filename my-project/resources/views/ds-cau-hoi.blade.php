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
		$("#cau-hoi-datatable").DataTable({
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
				<h4 class="header-title">Danh Sách Câu Hỏi</h4>

					<form action="{{ route('cau-hoi/xu-li-them-moi') }}" method="POST">
                	@csrf
					<button type="button" class="btn btn-primary waves-effect waves-light"data-toggle="modal" data-target="#myModalThemMoi" id="open" style="margin-top:20px; margin-bottom:20px">Thêm Mới</button>
					<div class="modal fade" tabindex="-1" role="dialog" id="myModalThemMoi" >
				        <div class="modal-dialog modal-dialog-centered" role="document">
				            <div class="modal-content">
				                <div class="alert alert-danger" style="display:none"></div>
				                <div class="modal-header">
				                    <h5 class="modal-title">Thêm Mới Câu Hỏi</h5>
				                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				                        <span aria-hidden="true">&times;</span>
				                    </button>
				                </div>
				                <div class="modal-body">
				                    <div class="row">
				                        <div class="form-group col-md-8">
                    						<label for="noi_dung">Nội Dung </label>
					                        <input type="text" class="form-control" name="noi_dung" id="noi_dung" placeholder="Nhập vào nội dung">
					                         <label for="linh_vuc_id">Lĩnh Vực </label>
					                        <select class="form-control" name="linh_vuc_id" id="linh_vuc_id" > 
					                            <option disabled="true" selected="true">
					                                Chọn lĩnh vực... 
					                            </option>
					                                @foreach($linhVuc as $table)
					                                <option value="{{$table->id}}">{{$table->ten}}
					                                </option>
					                                @endforeach
					                        </select>
					                         <label for="phuong_an_a">Phương Án A </label>
					                        <input type="text" class="form-control" name="phuong_an_a" id="phuong_an_a" placeholder="Nhập vào phương án A">
					                         <label for="phuong_an_b">Phương Án B</label>
					                        <input type="text" class="form-control" name="phuong_an_b" id="phuong_an_b" placeholder="Nhập vào phương án B">
					                         <label for="phuong_an_c">Phương Án C</label>
					                        <input type="text" class="form-control" name="phuong_an_c" id="phuong_an_c" placeholder="Nhập vào phương án C">
					                         <label for="phuong_an_d">Phương Án D</label>
					                        <input type="text" class="form-control" name="phuong_an_d" id="phuong_an_d" placeholder="Nhập vào phương án D">
					                         <label for="dap_an">Đáp Án</label>
					                        <select class="form-control" name="dap_an" id="dap_an" > 
					                            <option disabled="true" selected="true">
					                                Chọn đáp án... 
					                            </option>
					                            <option>A</option>
					                            <option>B</option>
					                            <option>C</option>
					                            <option>D</option>
					                        </select>
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


				<table id="cau-hoi-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th style="display: none">ID</th>
							<th style="display: none">Lĩnh Vực</th>
							<th style="display: none">Nội dung</th>
							<th style="display: none">Thao tác</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($cauHoi as $table)
						<tr>
							<td>
								{{ $table->id }}
							</td>
							<td>
								<p>{{ $table->linhVuc->ten }} </p>
							</td>
							<td>
								<p>{{ $table->noi_dung }} </p>
								<p>Phương án A: {{ $table->phuong_an_a }}</p>
								<p>Phương án B: {{ $table->phuong_an_b }}</p>
								<p>Phương án C: {{ $table->phuong_an_c }}</p>
								<p>Phương án D: {{ $table->phuong_an_d }}</p>
								<p>Đáp án: {{ $table->dap_an }}</p>
							</td>
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

								                    <h5 class="modal-title">Cập Nhật Câu Hỏi</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <div class="form-group col-md-8">
								                            <label for="noi_dung">Nội dung </label>
									                        <input type="text" class="form-control" name="noi_dung" id="noi_dung" value="{{ $table->noi_dung }}"></br>
									                        <label for="linh_vuc_id">Lĩnh vực</label>
									                        <select class="form-control" name="linh_vuc_id" id="linh_vuc_id" > 
								                                @foreach($linhVuc as $table1)
								                                <option value="{{$table1->id}}">{{$table1->ten}}</option>
								                                @endforeach
									                        </select></br>
									                        <label for="phuong_an_a">Phương án A </label>
									                        <input type="text" class="form-control" name="phuong_an_a" id="phuong_an_a" value="{{ $table->phuong_an_a }}"></br>
									                        <label for="phuong_an_b">Phương án B </label>
									                        <input type="text" class="form-control" name="phuong_an_b" id="phuong_an_b" value="{{ $table->phuong_an_b }}"></br>
									                        <label for="phuong_an_c">Phương án C </label>
									                        <input type="text" class="form-control" name="phuong_an_c" id="phuong_an_c" value="{{ $table->phuong_an_c }}"></br>
									                        <label for="phuong_an_d">Phương án D </label>
									                        <input type="text" class="form-control" name="phuong_an_d" id="phuong_an_d" value="{{ $table->phuong_an_d }}"></br>
									                        <label for="dap_an">Đáp án </label>
									                        <select class="form-control" name="dap_an" id="dap_an" > 
								                                <option disabled="true" selected="true">Chọn đáp án...</option>
									                            <option>A</option>
									                            <option>B</option>
									                            <option>C</option>
									                            <option>D</option>
									                        </select>
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
								                    <h5 class="modal-title">Xóa Câu Hỏi</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <h4 style="padding-left: 75px;">Bạn có muốn xóa câu hỏi này không?</h4>
								                    </div>
								                    <div class="row">
								                        <label style="padding-left: 75px; display: block">{{ $table->noi_dung }}</label>
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