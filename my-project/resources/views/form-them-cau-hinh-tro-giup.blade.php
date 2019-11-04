@extends ('layout')

@section('main-content')
	<div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm Mới Cấu Hình Trợ Giúp</h4>
                <form action="{{ route('cau-hinh-tro-giup/xu-li-them-moi') }}" method="POST">
                	@csrf
                    <div class="form-group">
                         <label for="loai_tro_giup">Loại Trợ Giúp </label>
                        <input type="text" class="form-control" name="loai_tro_giup" id="loai_tro_giup" placeholder="Nhập vào loại trợ giúp">
                        <label for="thu_tu">Thứ Tự </label>
                        <input type="text" class="form-control" name="thu_tu" id="thu_tu" placeholder="Nhập vào số thứ tự">
                        <label for="credit">Credit </label>
                        <input type="text" class="form-control" name="credit" id="credit" placeholder="Nhập vào số credit">
                    </div>   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 