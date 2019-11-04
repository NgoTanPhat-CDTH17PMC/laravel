@extends ('layout')

@section('main-content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">Cập nhật lĩnh vực</h4>
                <form action="{{ route('linh-vuc/xu-li-cap-nhat') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-group mb-3">
                            <label for="ten_linh_vuc">Tên lĩnh vực </label>
                            <select class="form-control" name="linh_vuc">
                                @foreach($linhVuc as $table)
                                <option value="{{ $table->id }}">{{ $table->ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="ten_linh_vuc">Tên lĩnh vực mới</label>
                        <input type="text" class="form-control" name="ten_linh_vuc_moi" id="ten_linh_vuc_moi" placeholder="Nhập vào tên lĩnh vực mới">
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 