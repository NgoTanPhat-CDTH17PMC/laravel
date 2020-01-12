@extends ('layout')
@section('css')
<link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('js')
<script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>
@endsection
@section('main-content')
<div class="row">
    <div class="col-lg-4">
        <div class="text-center card-box">
            <div class="pt-2 pb-2">
                <img src="{{ asset('assets/images/avt_tanphat.png') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Ngô Tấn Phát</a></h4>
                <p class="text-muted"><i class="mdi mdi-map-marker-outline"></i> Đồng Tháp</p>

                <div class="font-14">
                    <span class="badge badge-light-primary badge-pill">UI Developer</span>
                    <span class="badge badge-light-secondary badge-pill">Angular</span>
                    <span class="badge badge-light-success badge-pill">React</span>
                </div>

                <p class="text-muted mt-3">Traditional heading elements are designed to work best
                    in the meat of your page content. When you need a heading to stand out.</p>

                <div class="row mt-3">
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>98%</h4>
                            <p class="mb-0 text-muted text-truncate">Job Success</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>$29.8k</h4>
                            <p class="mb-0 text-muted text-truncate">Total Earned</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>1125</h4>
                            <p class="mb-0 text-muted text-truncate">Hours Worked</p>
                        </div>
                    </div>
                </div> <!-- end row-->

            </div> <!-- end .padding -->
        </div> <!-- end card-box-->
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="text-center card-box">
            <div class="pt-2 pb-2">
                <img src="{{ asset('assets/images/avt_thanhtam.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Lê Võ Thành Tâm</a></h4>
                <p class="text-muted"><i class="mdi mdi-map-marker-outline"></i> Tiền Giang</p>

                <div class="font-14">
                    <span class="badge badge-light-danger badge-pill">Vue Js</span>
                    <span class="badge badge-light-info badge-pill">PHP</span>
                    <span class="badge badge-light-dark badge-pill">Nodejs</span>
                </div>

                <p class="text-muted mt-3">Traditional heading elements are designed to work best
                    in the meat of your page content. When you need a heading to stand out.</p>

                <div class="row mt-3">
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>100%</h4>
                            <p class="mb-0 text-muted text-truncate">Job Success</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>$65.3k</h4>
                            <p class="mb-0 text-muted text-truncate">Total Earned</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>2184</h4>
                            <p class="mb-0 text-muted text-truncate">Hours Worked</p>
                        </div>
                    </div>
                </div> <!-- end row-->

            </div> <!-- end .padding -->
        </div> <!-- end card-box-->
    </div> <!-- end col -->

    <div class="col-lg-4">
        <div class="text-center card-box">
            <div class="pt-2 pb-2">
                <img src="{{ asset('assets/images/avt_minhtuan.jpg') }}" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Nguyễn Võ Minh Tuấn</a></h4>
                <p class="text-muted"><i class="mdi mdi-map-marker-outline"></i>Long An</p>

                <div class="font-14">
                    <span class="badge badge-light-info badge-pill">PHP</span>
                    <span class="badge badge-light-secondary badge-pill">Angular</span>
                    <span class="badge badge-light-success badge-pill">React</span>
                </div>

                <p class="text-muted mt-3">Traditional heading elements are designed to work best
                    in the meat of your page content. When you need a heading to stand out.</p>

                <div class="row mt-3">
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>95%</h4>
                            <p class="mb-0 text-muted text-truncate">Job Success</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>$25.6k</h4>
                            <p class="mb-0 text-muted text-truncate">Total Earned</p>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mt-3">
                            <h4>325</h4>
                            <p class="mb-0 text-muted text-truncate">Hours Worked</p>
                        </div>
                    </div>
                </div> <!-- end row-->

            </div> <!-- end .padding -->
        </div> <!-- end card-box-->
    </div> <!-- end col -->
</div>
@endsection