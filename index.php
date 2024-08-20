<?php
ob_start();
session_start();
if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "views/header.php";
include "model/connect.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/user.php";
include "model/binhluan.php";
include "model/blog.php";
include "model/donhang.php";
include "model/trang_thai.php";
include "model/donhang_detail.php";
$list_user = loadAll_user();
$list_top = load_sptop();
$listsanpham = load_all();
$list_dm = loadAll_danhmuc();

if(isset($_GET['act']) && ($_GET['act']) != ""){
$act = $_GET['act'];
$kyw = "";$checkshop = "";
// $list_tendm=[];$list_tensp=[];
switch($act){
    case "lien_he":
        include "views/lien_he.php";
    break;
    
    case "login":
        if(isset($_POST['login'])){
            foreach($list_user as $item){
            // extract($list_user);
            if($_POST['user_name'] == "" || $_POST['user_password'] == ""){
                $check = "Vui lòng điền đầy đủ thông tin";
            }else if($_POST['user_name'] == $item['tai_khoan'] && $_POST['user_password'] == $item['mat_khau']){
                if($item['ban'] == 1){
                    $check = "Tài khoản này đã bị cấm, bạn có thể liên hệ admin để được tư vấn hỗ trợ";
                }else{
                $_SESSION['user'] = $_POST['user_name'];
                $_SESSION['pass'] = $_POST['user_password'];
                $_SESSION['role'] = $item['id_chuc_vu'];
                $_SESSION['id'] = $item['id'];
                $_SESSION['dia_chi'] = $item['dia_chi'];
                $_SESSION['sdt'] = $item['sdt'];
                $_SESSION['email'] = $item['email'];
                $_SESSION['ban'] = $item['ban'];
                header("location:index.php");
                exit();
                }
            }else if($_POST['user_name'] != $item['tai_khoan'] && $_POST['user_password'] != $item['mat_khau']){
                $check = "Sai thông tin tài khoản hoặc mật khẩu";
            }
        }
        }
        include "views/user/login.php";
    break;

    case "sign_up":
        if(isset($_POST['dangky'])){
            $user_exiest = false;
            foreach($list_user as $item){
                if($_POST['user_name'] === $item['tai_khoan']){
                    $user_exiest = true;
                }
            }
            if($user_exiest == true){
                $check_re = "Tài khoản đã tồn tại";
            }else if($_POST['user_name'] == "" || $_POST['user_password'] == "" || $_POST['email'] == "" || $_POST['sdt'] == ""){
                $check_re = "Vui lòng điền đầy đủ thông tin";
            }else{
                $_SESSION['user'] = $_POST['user_name'];
                $_SESSION['pass'] = $_POST['user_password'];
                $_SESSION['email'] = $_POST['email'];
                $_SESSION['sdt'] = $_POST['sdt'];
                insert_user($_SESSION['user'],$_SESSION['pass'],$_SESSION['email'],$_SESSION['sdt']);
                $check_re = "Đăng ký thành công, đăng nhập ngay thôi (●'◡'●).";
            }
        }
        
        include "views/user/sign_up.php";
    break;    

    case "log_out":
        session_unset();
        header("location:index.php");
        exit();
        include "views/home.php";
    break;  

    case "shop":
        if(isset($_POST['search']) && $_POST['search'] != "" ){
        if($_POST['kyw'] == ""){
            $err_kyw="Vui lòng điền đầy đủ thông tin";
        }else{
            $kyw=$_POST['kyw'];
            $list_tensp = search_sp($kyw);
        }
    }
        if(isset($_GET['name_dm']) && $_GET['name_dm'] != ""){
            $name_dm = $_GET['name_dm'];
            $list_tendm = search_dm($name_dm);
        }
        
        include "views/shop.php";
        break;    
    
    case "phobien":
        if(isset($_GET['gia2tr']) && $_GET['gia2tr']){
            $gia = $_GET['gia2tr'];
            $list_sp_price = load_sanpham_gia($gia);
        }else if(isset($_GET['gia5tr']) && $_GET['gia5tr']){
            $gia = $_GET['gia5tr'];
            $list_sp_price = load_sanpham_gia($gia);
        }else if(isset($_GET['gia2-4tr9']) && $_GET['gia2-4tr9']){
            $gia = $_GET['gia2-4tr9'];
            $list_sp_price = load_sanpham_gia($gia);
        }
        
        include "views/shop.php";
        break;    

    case "detail_sp":
        $error_cmt = "";
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $items_per_page = 2;
        $offset = ($current_page - 1) * $items_per_page;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $listsanpham = loadone_sanpham($id);
            $list_bl = load_page_cmt_hientai_idsp($id,$offset, $items_per_page);
            $total_items =load_total_cmt_idsp($id);
            extract($listsanpham);
        }
        if(isset($_POST['submit_bl']) &&  $_POST['noi_dung'] != ""){
            $noi_dung = $_POST['noi_dung'];
            $id_nguoi_dung = $_POST['id_nguoi_dung'];
            $id_san_pham = $_POST['id_san_pham'];
            insert_binhluan($id_san_pham,$id_nguoi_dung,$noi_dung);
            $listsanpham = loadone_sanpham($id_san_pham);
            $list_bl = load_page_cmt_hientai_idsp($id_san_pham,$offset, $items_per_page);
            $total_items =load_total_cmt_idsp($id_san_pham);
            extract($listsanpham);
        }else if(isset($_POST['submit_bl']) && $_POST['noi_dung'] == ""){
            $error_cmt = "Không được để trống";

            $id_san_pham = $_POST['id_san_pham'];
            $listsanpham = loadone_sanpham($id_san_pham);
            $list_bl = load_page_cmt_hientai_idsp($id_san_pham,$offset, $items_per_page);
            $total_items =load_total_cmt_idsp($id_san_pham);
            extract($listsanpham);
        }  
          
        $total_pages = ceil($total_items / $items_per_page);

        $list_sp_decu = load_all();
        include "views/detail_product.php";
        break;
    
        case "bao_hanh":
            include "views/bao_hanh.php";
        break;

        case "blog":
            include "views/blog.php";
        break;

        //bill   
        case "addcart":   
            //lấy dữ liệu từ form để lưu vào giỏ
            if(isset($_POST['addtocart'])&&($_POST['addtocart'])){
                $id=$_POST['id'];
                foreach($listsanpham as $item){
                    if($item['id'] == $id){
                        $sl_max=$item['so_luong'];
                    }
                }
                $ten_san_pham=$_POST['ten_san_pham'];
                $anh_san_pham=$_POST['anh_san_pham'];
                $gia_san_pham=$_POST['gia_san_pham'];
                $sl = 1;

                if(isset($_POST['sl']) && $_POST['sl'] <= $sl_max ){
                    $sl = $_POST['sl'];
                }else if($_POST['sl'] >= $sl_max){
                    $sl = $sl_max;
                }
                else{
                    $sl=1;
                }

                $fg=0;
                //kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không?
                //nếu có chỉ cập nhật lại số lượng
                $i=0;
    
                foreach ($_SESSION['giohang'] as $item) {
                    if($item[1]==$ten_san_pham){
                        $slnew=$sl+$item[4];
                        $_SESSION['giohang'][$i][4]=$slnew;
                        $fg=1;
                        break;
                    }
                    $i++;
                }
                //còn ngược lại add mới sp vào giỏ hàng
                //khởi tạo 1 mảng con trước khi đưa vào giỏ hàng
                if($fg==0){
                    $item=array($id,$ten_san_pham,$anh_san_pham,$gia_san_pham,$sl);
                    $_SESSION['giohang'][]=$item;
                }
                
            }
            else if(isset($_GET['id'])&&($_GET['id'])){
                foreach($listsanpham as $item){
                    if($item['id'] == $_GET['id']){
                        $id=$_GET['id'];
                        $ten_san_pham=$item['ten_san_pham'];
                        $anh_san_pham=$item['anh_san_pham'];
                        $gia_san_pham=$item['gia_san_pham'];
                        $sl_max=$item['so_luong'];
                        $sl = 1;
                    }
                }
                // $sl = 1;
                // if(isset($_POST['sl']) && $_POST['sl'] <= $sl_max ){
                //     $sl = $_POST['sl'];
                // }else if($_POST['sl'] >= $sl_max){
                //     $sl = $_POST['sl'] = $sl_max;
                // }
                // else{
                //     $sl=1;
                // }
                $fg=0;
                //kiểm tra sản phẩm có tồn tại trong giỏ hàng hay không?
                //nếu có chỉ cập nhật lại số lượng
                $i=0;
    
                foreach ($_SESSION['giohang'] as $item) {
                    if($item[1]==$ten_san_pham){
                        $slnew=$sl+$item[4];
                        $_SESSION['giohang'][$i][4]=$slnew;
                        $fg=1;
                        break;
                    }
                    $i++;
                }
                //còn ngược lại add mới sp vào giỏ hàng
                //khởi tạo 1 mảng con trước khi đưa vào giỏ hàng
                if($fg==0){
                    $item=array($id,$ten_san_pham,$anh_san_pham,$gia_san_pham,$sl);
                    $_SESSION['giohang'][]=$item;
                }
                
            }
            include "views/viewcart.php";
            break;
          
        case "delcart":
            if(isset($_SESSION['giohang'])) unset($_SESSION['giohang']);
            include "views/home.php";
    
        case "delCart" :
            {
                if(isset($_GET['idcart'])) {
                    array_splice($_SESSION['giohang'], $_GET['idcart'],1);
                } else {
                    $_SESSION['giohang'] = [];
                }
            }    
            include "views/viewcart.php";
            break;
    
        case "donhang" :
            
            include "views/donhang.php";
            break;
    
        case "cart" :
            include "views/viewcart.php";
            break;    
             
    
        case "thanhtoan" :
            $error_thanhtoan = "";
            if((isset($_POST['thanhtoan']))&&($_POST['thanhtoan'])){
                
                if (isset($_SESSION['user']) && isset($_SESSION['id'])) {
                    $iduser = $_SESSION['id'];
                }
                if(empty($_POST['pttt'])){
                    $error_thanhtoan = "Bạn phải chọn 1 phương thức, mới có thể thanh toán";
                }else if($_POST['dia_chi'] == ""){    
                    $error_thanhtoan = "Không được để trống địa chỉ ";
                }else if($_POST['email'] == ""){    
                    $error_thanhtoan = "Không được để trống email";
                }else if($_POST['so_dien_thoai'] == ""){    
                    $error_thanhtoan = "Không được để trống số điện thoái";
                }else if($_POST['ten_nguoi_dung'] == ""){    
                    $error_thanhtoan = "Không được để trống họ tên";
                }
                else{
                    $ten_nguoi_dung=$_POST['ten_nguoi_dung'];
                    $dia_chi=$_POST['dia_chi'];
                    $email=$_POST['email'];
                    $so_dien_thoai=$_POST['so_dien_thoai'];
                    $pttt=$_POST['pttt'];
                    $madh="CARD".rand(0,999999);
                    $ngaydathang = date('h:i:sa d/m/Y');
                    //tạo đơn hàng
                    //và trả về 1 id đơn hàng
                    $id_dh=taodonhang($iduser,$madh,$pttt,$ten_nguoi_dung,$dia_chi,$email,$so_dien_thoai,$ngaydathang);
                    if(isset($_SESSION['giohang'])){
                        foreach ($_SESSION['giohang'] as $item) {
                        taodonhang_detail($item['0'],$id_dh,$item['4'],$item['3']);
                    }
                    $error_thanhtoan = "Mua hàng thành công ,cảm ơn quý khách đã mua hàng của chúng tôi";
                    
                    
                    if (isset($_SESSION['giohang'])) {
                        unset($_SESSION['giohang']);
                    }
                }
                }
            }
    
            include "views/donhang.php";  
            break;

            // acc
        case "account":
            include "views/user/account.php";
            break;
        
        case "cmt":
            $items_per_page = 7;
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($current_page - 1) * $items_per_page;
            if(isset($_SESSION['id'])) {
            $list_cmt = load_page_cmt_hientai_iduser($_SESSION['id'],$offset,$items_per_page);
            $total_items = load_total_cmt_iduser($_SESSION['id']);
            $total_pages = ceil($total_items / $items_per_page);
            } else {
                $list_cmt = [];
            }
            include "views/user/cmt.php";
            break;    

        case "location_edit":
            if (isset($_POST['change'])){
                $id = $_POST['id'];
                $dia_chi = $_POST['dia_chi'];
                $sdt = $_POST['sdt'];
                $errLoca = $errSdt = $errTb = null;
                if($dia_chi == ""){
                    $errLoca = "Vui lòng nhập không để trống";
                }else if($sdt == "" || strlen($sdt) != 10){
                    $errSdt = "Vui lòng nhập không để trống và đúng 10 số";
                }else{
                    $update_location = update_diachi($id,$sdt,$dia_chi);
                    if($update_location){
                        $errTb = "Cập nhật địa chỉ thành công";
                        $_SESSION['dia_chi'] = $dia_chi ;
                        $_SESSION['sdt'] = $sdt ;
                    } else {
                        $errLoca = "Cập nhật địa chỉ thất bại";
                    }
                }
            
            }
            include "views/user/location_edit.php";
            break;    
            
        case "password_edit":
            if (isset($_POST['change'])){
                $id = $_POST['id'];
                $current_pass = $_POST['current_pass'];
                $new_pass = $_POST['new_pass'];
                $confirm_pass = $_POST['confirm_pass'];
                $errTb = $errCurrent = $errNew = $errConfirm = null;

                if($current_pass== "" && $current_pass != $_SESSION['pass']){
                    $errCurrent = "Vui lòng nhập đúng và không để trống";
                }else if($new_pass == "" &&  $confirm_pass == "" ){
                    $errNew = $errConfirm = "Vui lòng nhập không để trống";
                }else if($confirm_pass != $new_pass){
                    $errNew = $errConfirm = "Mật khẩu xác nhận không khớp";
                }
                else{
                    $update_location = update_pass($id,$new_pass);
                    if($update_location){
                        $errTb = "Cập nhật mật khẩu thành công";
                    } else {
                        $errTb = "Cập nhật mật khẩu thất bại";
                    }
                }
            
            }
            include "views/user/password_edit.php";
            break;    

        case "don_hang_user":
            $items_per_page = 7;
            $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $offset = ($current_page - 1) * $items_per_page;
            $total_items = load_total_donhang_iduser($_SESSION['id']);
            $total_pages = ceil($total_items / $items_per_page);
            if(isset($_GET['huy_don'])){
                $id = $_GET['id'];
                $tt = $_GET['tt'];
                if($tt == 1 ){
                update_tt_donhang($id,3);
                }
            }
            $listdonhang = load_page_donhang_notlap_iduser($_SESSION['id'],$offset, $items_per_page);
                
            include "views/user/don_hang.php";
            break;
        
        case "detail_dh":
            if(isset($_GET['id'])&&($_GET['id'])){
                $detail_dh = loadone_bill_detail($_GET['id']);
            }
            include "views/user/bill_detail.php";
            break;       

    default: 
    include "views/home.php";
    break;    
    
}
}else{
    include "views/home.php";  
}
include "views/footer.php";
ob_end_flush(); 
?>