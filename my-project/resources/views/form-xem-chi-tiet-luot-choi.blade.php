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
?>

@section('main-content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Danh Sách Lượt Chơi</h4>
				<a  href="{{ route('luot-choi/ds-luot-choi') }}">
					<button type="button" class="btn btn-primary waves-effect waves-light" style="margin-top:20px; margin-bottom:20px">Trở Về</button>
				</a>
				<table id="luot-choi-datatable" class="table dt-responsive nowrap">
					<thead>
						<tr>
							<th style="width: 50px">ID</th>
							<th>ID lượt chơi</th>
							<th>Nội dung câu hỏi</th>
							<th>Phương án</th>
							<th>Điểm</th>
						</tr>
					</thead>
					
					<tbody>
						@foreach ($chiTietLuotChoi as $table)
						<?php
							$cauHoi = DB::table('cau_hoi')->where('id', $table->cau_hoi_id)->get();
						?>
						<tr>
							<td>{{ $table->id }}</td>
							<td>{{ $table->luot_choi_id }}</td>
							<td>{{ $cauHoi[0]->noi_dung }}</td>
							@if ($table->phuong_an == $cauHoi[0]->dap_an)
								<td style="color:blue">{{ $table->phuong_an }}</td>
							@else
								<td style="color:red">{{ $table->phuong_an }}</td>
							@endif
							<td>{{ $table->diem }}</td>
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