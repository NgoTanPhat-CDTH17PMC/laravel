@extends ('layout')

@section('main-content')
	<div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Thêm Mới Cấu Hình Điểm Câu Hỏi</h4>
                <form action="{{ route('cau-hinh-diem-cau-hoi/xu-li-them-moi') }}" method="POST">
                	@csrf
                    <div class="form-group">
                        <label for="thu_tu">Thứ Tự </label>
                        <input type="text" class="form-control" name="thu_tu" id="thu_tu" placeholder="Nhập vào số thứ tự">
                        <label for="diem">Điểm </label>
                        <input type="text" class="form-control" name="diem" id="diem" placeholder="Nhập vào điểm">
                    </div>   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 
