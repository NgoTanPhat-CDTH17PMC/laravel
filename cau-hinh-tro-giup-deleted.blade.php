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

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Cấu Hình Trợ Giúp Đã Xoá</h4><br>

				<table id="cau-hoi-datatable" class="table dt-responsive nowrap">
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
								<form method="POST" action="khoi-phuc/{{$table->id}}" style="float:left" >
									@csrf
									<button type="button" class="btn btn-info btn-rounded waves-effect waves-light" data-toggle="modal" data-target="#myModalXoa{{$table->id}}" id="open">Khôi Phục</button>
									<div class="modal fade" tabindex="-1" role="dialog" id="myModalXoa{{$table->id}}">
								        <div class="modal-dialog modal-dialog-centered" role="document">
								            <div class="modal-content">
								                <div class="alert alert-danger" style="display:none"></div>
								                <div class="modal-header">
								                    <h5 class="modal-title">Khôi Phục Câu Hỏi</h5>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                        <span aria-hidden="true">&times;</span>
								                    </button>
								                </div>
								                <div class="modal-body">
								                    <div class="row">
								                        <h4 style="padding-left: 75px;">Bạn có muốn khôi phục cấu hình này không?</h4>
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