
<form action="{{ $linhVuc->id }}" method="POST" id="form">
    @method('PATCH')
    @csrf
  <!-- Modal -->
    <div class="modal" tabindex="-1" role="dialog" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">

                    <h5 class="modal-title">Thêm Mới Lĩnh V</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="ten_linh_vuc">Tên lĩnh vực </label>
                            <input type="text" class="form-control" name="ten_linh_vuc" id="ten_linh_vuc" value="{{ $linhVuc->ten }}" disabled></br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="ten_linh_vuc">Tên lĩnh vực mới</label>
                            <input type="text" class="form-control" name="ten_linh_vuc_moi" id="ten_linh_vuc_moi" placeholder="Nhập vào tên lĩnh vực mới">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button  class="btn btn-success" id="ajaxSubmit">Lưu thay đổi</button>
                </div>
            </div>
        </div>
    </div>
</form>


<!--
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <h4 class="mb-3 header-title">{{ $pageName }}</h4>
            <form action="{{ $linhVuc->id }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="ten_linh_vuc">Tên lĩnh vực </label>
                    <input type="text" class="form-control" name="ten_linh_vuc" id="ten_linh_vuc" value="{{ $linhVuc->ten }}" disabled></br>
                    
                    <label for="ten_linh_vuc">Tên lĩnh vực mới</label>
                    <input type="text" class="form-control" name="ten_linh_vuc_moi" id="ten_linh_vuc_moi" placeholder="Nhập vào tên lĩnh vực mới">
                </div>
               
                <button type="submit" class="btn btn-primary waves-effect waves-light">Cập Nhật</button>
            </form>
        </div> 
    </div>
</div> -->