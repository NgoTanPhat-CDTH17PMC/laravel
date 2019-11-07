<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Không tìm thấy trang</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="error-ghost text-center">
                                    <img src="assets/images/error.svg" width="200" alt="error-image"/>
                                </div>

                                <div class="text-center">
                                    <h3 class="mt-4 text-uppercase font-weight-bold">Không tìm thấy trang</h3>
                                    <p class="text-muted mb-0 mt-3" style="line-height: 20px;">Trang bạn đang cố truy cập hiện không hoặc chưa tồn tại. Vui lòng quay lại sau.</p>

                                    <a class="btn btn-info mt-3" href="{{ route('trang-chu') }}"><i class="mdi mdi-reply mr-1"></i> Về Trang Chủ</a>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->       

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

        <!-- Vendor js -->
        <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.min.js') }}"></script>
        
    </body>
</html>