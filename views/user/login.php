<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/daxone/daxone/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 10:13:09 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daxone - eCommerce Bootstrap 5 Template</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="assets/css/vendor/line-awesome.css">
    <link rel="stylesheet" href="assets/css/vendor/themify.css">
    <!-- othres CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/slick.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div class="main-wrapper">
        
        
        <div class="breadcrumb-area bg-img" style="background-image:url(assets/images/bg/breadcrumb.jpg);">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <h2>Đăng nhập</h2>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Đăng nhập</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login-register-area pt-85 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ms-auto me-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-bs-toggle="tab" href="#lg1">
                                    <h4> Đăng nhập </h4>
                                </a>
                                
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="index.php?act=login" method="post">
                                                <input type="text" name="user_name" placeholder="Tài khoản">
                                                <input type="password" name="user_password" placeholder="Mật khẩu">
                                                <p style="color:red"><?php echo (isset($check)) ? $check : "" ?></p>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Lưu đăng nhập</label>
                                                        <a href="index.php?act=sign_up">Chưa có tài khoản?</a>
                                                    </div>
                                                    <button type="submit" name="login" onclick="stop(event)">Đăng nhập</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="index.php?act=sign_up" method="post">
                                                <input type="text" name="user_name" placeholder="Tài khoản">
                                                <input type="password" name="user_password" placeholder="Mật khẩu">
                                                <input name="email" placeholder="Email" type="email">
                                                <input name="sdt" placeholder="Số điện thoại" type="number">
                                                <div class="button-box">
                                                    <button type="submit" name="sign_up">Đăng ký</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- JS
============================================ -->

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="assets/js/plugins/countdown.js"></script>
    <script src="assets/js/plugins/counterup.js"></script>
    <script src="assets/js/plugins/images-loaded.js"></script>
    <script src="assets/js/plugins/isotope.js"></script>
    <script src="assets/js/plugins/instafeed.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/plugins/jquery-ui-touch-punch.js"></script>
    <script src="assets/js/plugins/magnific-popup.js"></script>
    <script src="assets/js/plugins/owl-carousel.js"></script>
    <script src="assets/js/plugins/scrollup.js"></script>
    <script src="assets/js/plugins/waypoints.js"></script>
    <script src="assets/js/plugins/slick.js"></script>
    <script src="assets/js/plugins/wow.js"></script>
    <script src="assets/js/plugins/textillate.js"></script>
    <script src="assets/js/plugins/elevatezoom.js"></script>
    <script src="assets/js/plugins/sticky-sidebar.js"></script>
    <script src="assets/js/plugins/smoothscroll.js"></script>
    <!-- Main JS -->
    <script src="assets/js/main.js">
        function stop(event){
            event.preventDefault();
        }
    </script>
</body>


<!-- Mirrored from template.hasthemes.com/daxone/daxone/login-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 10:13:09 GMT -->
</html>