@extends ('layout')

@section('main-content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">{{ $pageName }}</h4>
                <form action="{{ $cauHoi->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="noi_dung">Nội dung </label>
                        <input type="text" class="form-control" name="noi_dung" id="noi_dung" value="{{ $cauHoi->noi_dung }}"></br>
                        <label for="linh_vuc_id">Lĩnh vực</label>
                        <select class="form-control" name="linh_vuc_id" id="linh_vuc_id" > 
                            <option>
                                {{$cauHoi->linhVuc->ten}}
                            </option>
                            <option>
                                @foreach($linhVuc as $table)
                                <option value="{{$table->id}}">{{$table->ten}}</option>
                                @endforeach
                            </option>
                        </select></br>
                        <label for="phuong_an_a">Phương án A </label>
                        <input type="text" class="form-control" name="phuong_an_a" id="phuong_an_a" value="{{ $cauHoi->phuong_an_a }}"></br>
                        <label for="phuong_an_b">Phương án B </label>
                        <input type="text" class="form-control" name="phuong_an_b" id="phuong_an_b" value="{{ $cauHoi->phuong_an_b }}"></br>
                        <label for="phuong_an_c">Phương án C </label>
                        <input type="text" class="form-control" name="phuong_an_c" id="phuong_an_c" value="{{ $cauHoi->phuong_an_c }}"></br>
                        <label for="phuong_an_d">Phương án D </label>
                        <input type="text" class="form-control" name="phuong_an_d" id="phuong_an_d" value="{{ $cauHoi->phuong_an_d }}"></br>
                        <label for="dap_an">Đáp án </label>
                        <input type="text" class="form-control" name="dap_an" id="dap_an" value="{{ $cauHoi->dap_an }}"></br>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 