@extends ('layout')

@section('main-content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">{{ $pageName }}</h4>
                <form action="{{ $cauHinhApp->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="co_hoi_sai">Cơ hội sai</label>
                        <input type="text" class="form-control" name="co_hoi_sai" id="co_hoi_sai" value="{{ $cauHinhApp->co_hoi_sai }}"></br>
                        
                        <label for="thoi_gian_tra_loi">Thời gian trả lời</label>
                        <input type="text" class="form-control" name="thoi_gian_tra_loi" id="thoi_gian_tra_loi" value="{{$cauHinhApp->thoi_gian_tra_loi}}">
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 