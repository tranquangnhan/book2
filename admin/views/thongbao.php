<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>404 Error | Adminto - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="views/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="views/assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="views/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="views/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

    </head>


    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="index.html" class="logo">
                                <img src="views/assets/images/logo-light.png" alt="" height="22" class="logo-light mx-auto">
                               <img src="views/assets/images/logo-dark.png" alt="" height="22" class="logo-dark mx-auto">
                            </a>
                            <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">

                                <div class="text-center">
                                    <h3 class="mt-3 mb-2"><?php echo $_SESSION['message'];unset($_SESSION['message']);?></h3>
                                    <p class="text-muted mb-3">.</p>

                                    <a href="javascript:history.go(-1)" class="btn btn-danger waves-effect waves-light"><i class="fas fa-home mr-1"></i> Trở về trang trước</a>
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
    

        <!-- Vendor js -->
        <script src="views/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="views/assets/js/app.min.js"></script>
        
    </body>
</html>