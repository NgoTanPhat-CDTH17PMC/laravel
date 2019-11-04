
@extends ('layout')

@section('main-content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3 header-title">{{ $pageName }}</h4>
                <form action="{{ $goiCredit->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="ten_goi_credit_cu">Tên gói Credit</label>
                        <input type="text" class="form-control" name="ten_goi_credit_cu" id="ten_goi_credit_cu" value="{{ $goiCredit->ten_goi }}" disabled></br>
                        
                        <label for="ten_goi_credit_moi">Tên mới</label>
                        <input type="text" class="form-control" name="ten_goi_credit_moi" id="ten_goi_credit_moi" placeholder="Nhập vào tên gói credit mới"></br>

                        <label for="so_credit">Số Credit mua được</label>
                        <input type="text" class="form-control" name="so_credit" id="so_credit" value="{{ $goiCredit->credit }}"></br>

                        <label for="so_tien">Số tiền</label>
                        <input type="text" class="form-control" name="so_tien" id="so_tien" value="{{ $goiCredit->so_tien }}"></br>
                    </div>
                   
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection 