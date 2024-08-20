<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/daxone/daxone/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 10:13:09 GMT -->

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
                    <h2>Trang tài khoản</h2>
                    <ul>
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="active">Bình luận </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- my account wrapper start -->
        <div class="my-account-wrapper pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                    <i class="fa fa-dashboard"></i><a href="index.php?act=account">Chi tiết tài khoản</a>
                                        <a href="index.php?act=don_hang_user"><i class="fa fa-cloud-download"></i> Đơn hàng</a>
                                        <a href="index.php?act=cmt"><i class="fa fa-cloud-download"></i> Bình luận</a>
                                        <a href="index.php?act=location_edit"><i class="fa fa-user"></i> Thay đổi địa chỉ</a>
                                        <a href="index.php?act=password_edit"><i class="fa fa-user"></i> Thay đổi mật khẩu</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->
                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-pane fade show active" id="download" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Bình luận</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                            <tr>
                                                                <th>Sản phẩm</th>
                                                                <th>Nội dung</th>
                                                                <th>Ngày bình luận</th>
                                                                <th>Đi tới</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $count = 0;
                                                            foreach ($list_cmt as $item) { ?>
                                                                <tr>
                                                                    <td><?php echo $item['ten_san_pham'] ?></td>
                                                                    <td><?php echo $item['noi_dung'] ?></td>
                                                                    <td><?php echo $item['thoi_gian_binh_luan'] ?></td>
                                                                    <td class="mota_bl"><a href="index.php?act=detail_sp&id=<?php echo $item['id_san_pham'] ?>" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Let's Go!</a></td>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <div class="pagination-style text-center">
                                                        <?php if(isset($list_tensp)){}else{?>
                                                            <ul style="list-style:none;display: flex;justify-content: center;">
                                                        <?php if ($current_page > 1) { ?>
                                                            <li><a id="page_item" style="color:black" class="prev" href="index.php?act=cmt&page=<?php echo $current_page - 1; ?>"><i class="la la-angle-left"></i></a></li>
                                                        <?php } ?>

                                                        <?php if ($current_page > 3) { ?>
                                                            <li><a id="tab_pre" href="index.php?act=cmt&page=1">1</a></li>
                                                            <?php if ($current_page > 4) { ?>
                                                                <li>...</li>
                                                            <?php } ?>
                                                        <?php } ?>

                                                        <?php
                                                        for ($page = max(1, $current_page - 2); $page <= min($total_pages, $current_page + 2); $page++) {
                                                        //     for ($page = 1; $page <= $total_pages; $page++){    
                                                            ?>    
                                                            <li><a id="<?php echo $page == $current_page ? 'active' : 'tab_pre'; ?>" href="index.php?act=cmt&page=<?php echo $page; ?>"><?php echo $page?></a></li>
                                                        <?php } ?>

                                                        <?php if ($current_page < $total_pages - 2) { ?>
                                                            <li>...</li>
                                                            <li><a id="tab_pre" href="index.php?act=cmt&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
                                                        <?php } ?>

                                                        <?php if ($current_page < $total_pages) { ?>
                                                            <li><a id="page_item" style="color:black" class="next" href="index.php?act=cmt&page=<?php echo $current_page + 1; ?>"><i class="la la-angle-right"></i></a></li>
                                                        <?php } ?>
                                                        </ul>
                                                        <?php }?>    
                                                    </div> 
                                            </div>
                                            
                                        </div>

                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
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
    <script src="assets/js/main.js"></script>
</body>


<!-- Mirrored from template.hasthemes.com/daxone/daxone/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 06 Jul 2024 10:13:09 GMT -->

</html>