@extends ('layout')

@section('main-content')
	<div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm Gói Credit</h4>
                <form action="{{ route('goi-credit/xu-li-them-moi') }}" method="POST">
                	@csrf
                    <div class="form-group">
                        <label for="ten_linh_vuc">Tên gói</label>
                        <input type="text" class="form-control" name="ten_goi" id="ten_goi" placeholder="Nhập vào tên gói credit">
                    </div>
                    <div class="form-group">
                        <label for="ten_linh_vuc">Số credit</label>
                        <input type="text" class="form-control" name="credit" id="credit" placeholder="Nhập vào số credit">
                    </div>
                    <div class="form-group">
                        <label for="ten_linh_vuc">Số tiền</label>
                        <input type="text" class="form-control" name="so_tien" id="so_tien" placeholder="Nhập vào số tiền để mua">
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                    
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 