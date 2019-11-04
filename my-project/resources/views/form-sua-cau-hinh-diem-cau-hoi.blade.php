@extends ('layout')

@section('main-content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">{{ $pageName }}</h4>
                <form action="{{ $cauHinhDiemCauHoi->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="thu_tu">Thứ tự</label>
                        <input type="text" class="form-control" name="thu_tu" id="thu_tu" value="{{ $cauHinhDiemCauHoi->thu_tu }}"></br>
                        
                        <label for="diem">Điểm</label>
                        <input type="text" class="form-control" name="diem" id="diem" value="{{$cauHinhDiemCauHoi->diem}}">
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 