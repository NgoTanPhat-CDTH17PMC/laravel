@extends ('layout')

@section('main-content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">{{ $pageName }}</h4>
                <form action="{{ $cauHinhTroGiup->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group"><label for="loai_tro_giup">Loại Trợ Giúp</label>
                        <input type="text" class="form-control" name="loai_tro_giup" id="loai_tro_giup" value="{{ $cauHinhTroGiup->loai_tro_giup }}"></br>
                        <label for="thu_tu">Thứ Tự</label>
                        <input type="text" class="form-control" name="thu_tu" id="thu_tu" value="{{ $cauHinhTroGiup->thu_tu }}"></br>
                        
                        <label for="credit">Credit</label>
                        <input type="text" class="form-control" name="credit" id="credit" value="{{$cauHinhTroGiup->credit}}">
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 