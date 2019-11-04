@extends ('layout')

@section('main-content')
	<div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm Mới Lĩnh Vực</h4>
                <form action="{{ route('linh-vuc/xu-li-them-moi') }}" method="POST">
                	@csrf
                    <div class="form-group">
                        <label for="ten_linh_vuc">Tên lĩnh vực </label>
                        <input type="text" class="form-control" name="ten_linh_vuc" id="ten_linh_vuc" placeholder="Nhập vào tên lĩnh vực">
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                    
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 
