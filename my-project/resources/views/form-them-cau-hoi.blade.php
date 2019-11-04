@extends ('layout')

@section('main-content')
	<div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm Mới Câu Hỏi</h4>
                <form action="{{ route('cau-hoi/xu-li-them-moi') }}" method="POST">
                	@csrf
                    <div class="form-group">
                        <label for="noi_dung">Nội Dung </label>
                        <input type="text" class="form-control" name="noi_dung" id="noi_dung" placeholder="Nhập vào nội dung">
                         <label for="linh_vuc_id">Lĩnh Vực </label>
                        <select class="form-control" name="linh_vuc_id" id="linh_vuc_id" > 
                            <option disabled="true" selected="true">
                                Chọn lĩnh vực... 
                            </option>
                                @foreach($linhVuc as $table)
                                <option value="{{$table->id}}">{{$table->ten}}</option>
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
                        <input type="text" class="form-control" name="dap_an" id="dap_an" placeholder="Nhập vào đáp án">
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                    
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 