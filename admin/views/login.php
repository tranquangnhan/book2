<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Đăng nhập</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../views/assets/images/favicon.ico">

        <!-- Bootstrap Css -->
        <link href="../views/assets/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="../views/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="../views/assets/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

    </head>


    <body class="authentication-bg">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="index.html" class="logo">
                                <img src="../views/assets/images/logo-light.png" alt="" height="22" class="logo-light mx-auto">
                               <img src="../views/assets/images/logo-dark.png" alt="" height="22" class="logo-dark mx-auto">
                            </a>
                            <p class="text-muted mt-2 mb-4">Login to manage</p>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">Login</h4>
                                </div>

                                <form method="POST" id="formlogin" data-parsley-validate novalidate> 
                                   
                                    <div class="form-group mb-3">
                                        <?php echo "<h3 class='text-danger'>".$_SESSION['error_taikhoan']."</h3>"; unset($_SESSION['error_taikhoan'])?>
                                        <label for="user">Email</label>
                                        <input class="form-control" type="user" name="email" id="user" required  placeholder="Email">
                                       
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" name="password" required id="password" placeholder="Password">
                                    </div>
                                    <div class="form-group mb-3">
                                    <?php
                                        if($emailexist && $emailexist!=''){
                                        echo '<span style="color:red;">'.$emailexist.'</span>';
                                    }
                                        if($checkloginwarn && $checkloginwarn!=''){
                                        echo '<span style="color:red;">'.$checkloginwarn.'</span>';
                                        }
                                        if($role && $role!=''){
                                            echo '<span style="color:red;">'.$role.'</span>';
                                            }
                                        ?>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <input class="btn btn-primary btn-block" type="submit" name="login" value="Đăng Nhập">
                                    </div>
                                    
                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-dark ml-1"><i class="fa fa-lock mr-1"></i>Quên mật khẩu?</a></p>
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
    

        <!-- Vendor js -->
        <script src="../views/assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="../views/assets/js/app.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"> </script>
        <script src="../views/assets/js/validate.js"></script>
        
    </body>
</html>