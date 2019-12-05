<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Đăng Nhập</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
        <script src="{{ asset('assets/js/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweet-alert.js') }}"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweet-alert.css') }}">
    </head>
    
    <body class="authentication-bg authentication-bg-pattern">
        @include('sweetalert::alert')
        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="26"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Nhập Tên Đăng Nhập và Mật Khẩu để truy cập admin panel.</p>
                                </div>

                                <h5 class="auth-title">ĐĂNG NHẬP</h5>
                                <form action="{{ route('xu-ly-dang-nhap') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="ten_dang_nhap">Tên Đăng Nhập</label>
                                        <input class="form-control" type="text" id="ten_dang_nhap" name="ten_dang_nhap" required="" placeholder="Nhập tên đăng nhập của bạn...">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="mat_khau">Mật Khẩu</label>
                                        <input class="form-control" type="password" required="" id="mat_khau" name="mat_khau" placeholder="Nhập mật khẩu của bạn...">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                            <label class="custom-control-label" for="checkbox-signin">Lưu Tài Khoản</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-danger btn-block" type="submit"> Đăng Nhập </button>
                                    </div>

                                </form>

                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">Hoặc đăng nhập bằng:</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Quên mật khẩu?</a></p>
                                <p class="text-muted">Chưa có tài khoản? <a href="pages-register.html" class="text-muted ml-1"><b class="font-weight-semibold">Đăng Ký</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2019 &copy; Upvex theme by <a href="" class="text-muted">Coderthemes</a> 
        </footer>

        @yield ('js')
        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        
    </body>
</html>