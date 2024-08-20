<?php
function taodonhang($iduser,$madh,$pttt,$ten_nguoi_dung,$dia_chi,$email,$so_dien_thoai,$ngaydathang){
    try{
    $sql = "INSERT INTO `don_hang` (`iduser`,`madh`, `pttt`, `ten_nguoi_dung`, `dia_chi`, `email`, `so_dien_thoai`,`ngaydathang`) 
    VALUES ('$iduser', '$madh', '$pttt', '$ten_nguoi_dung', '$dia_chi', '$email', '$so_dien_thoai', '$ngaydathang')";
    return pdo_execute_return_lastInsertId($sql, $args = []);
    } catch (PDOException $e) {
        echo "Error: ". $e->getMessage();
        
    }
}
// function tongdonhang()
// {
//     $tong = 0;
//     foreach ($_SESSION['giohang'] as $item) {
//         $tt=$item[3] * $item[4];
//         $tong += $tt;
//     }
//     return $tong;
// }


function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang)
{
    $sql = "INSERT INTO bill(iduser,bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$iduser','$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser, $idpro, $img, $name, $price, $soluong,$khuyenmai ,$thanhtien, $idbill)
{
    $sql = "INSERT INTO cart(iduser,idpro,img,name,price,soluong,khuyenmai,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$khuyenmai','$thanhtien','$idbill')";
    return pdo_execute($sql);
}

function loadone_bill($id)
{
    $sql = "select * from bill where id=" . $id;
    $bill = pdo_query_one($sql);
    return $bill;
}

function loadall_cart($idbill)
{
    $sql = "select * from cart where idbill=" . $idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_donhang()
{   try{
    $sql = " SELECT don_hang.id AS don_hang_id, don_hang.*, trang_thai.id AS trang_thai_id, trang_thai.*
    FROM `don_hang`
    INNER JOIN trang_thai ON don_hang.id_trang_thai = trang_thai.id
    order by `trang_thai_id` asc";
    $listdonhang = pdo_query($sql);
    return $listdonhang;
    }catch(Exception $e){
        echo "".$e->getMessage();
    }
}
function update_tt_donhang($id,$tt){

    $sql = "UPDATE `don_hang` SET `id_trang_thai` = '$tt' WHERE `don_hang`.`id` = $id";
    pdo_execute($sql);
    return true;
}
function delete_donhang($id) {
    $sql = "DELETE  FROM don_hang WHERE id =" . $id;
    pdo_execute($sql);
}
function load_total_donhang_iduser($id){
    try {
        $conn = pdo_get_connection();
        // if($id == ""){
        $sql = "
        SELECT nguoi_dung.id, COUNT(don_hang.id) AS total 
        FROM nguoi_dung
        INNER JOIN don_hang ON nguoi_dung.id = don_hang.iduser
        WHERE nguoi_dung.id = '$id'
        GROUP BY nguoi_dung.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (($result != 0) ? $result['total'] : 1);
    } catch (PDOException $e) {
        echo "".$e->getMessage();
    } finally {
        unset($conn);
    }
}
// load đơn hàng cho id user
function load_page_donhang_hientai_iduser($id,$offset, $items_per_page) {
    $sql = "SELECT nguoi_dung.id AS nguoi_dung_id, nguoi_dung.*,don_hang.id AS don_hang_id, don_hang.*,
            trang_thai.id AS trang_thai_id, trang_thai.*
            , don_hang_detail.tong   
            FROM nguoi_dung
            INNER JOIN don_hang ON nguoi_dung.id = don_hang.iduser
            INNER JOIN don_hang_detail ON don_hang.id = don_hang_detail.id_dh
            INNER JOIN trang_thai ON don_hang.id_trang_thai = trang_thai.id
            WHERE nguoi_dung.id = $id
            LIMIT $offset, $items_per_page
            "; // Sử dụng tham số để tránh SQL injection
    try{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sp;
    }catch(Exception $e){
        echo "lỗi: ".$e->getMessage();
    }
}
function load_page_donhang_notlap_iduser($id,$offset, $items_per_page) {
    $sql = "SELECT nguoi_dung.id AS nguoi_dung_id, nguoi_dung.*,don_hang.id AS don_hang_id, don_hang.*,
            trang_thai.id AS trang_thai_id, trang_thai.*
            , SUM(don_hang_detail.tong) AS tong 
            FROM nguoi_dung
            INNER JOIN don_hang ON nguoi_dung.id = don_hang.iduser
            INNER JOIN don_hang_detail ON don_hang.id = don_hang_detail.id_dh
            INNER JOIN trang_thai ON don_hang.id_trang_thai = trang_thai.id
            WHERE nguoi_dung.id = $id
            GROUP BY don_hang.id
            ORDER BY don_hang.id desc
            LIMIT $offset, $items_per_page
            "; // Sử dụng tham số để tránh SQL injection
    try{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sp;
    }catch(Exception $e){
        echo "lỗi: ".$e->getMessage();
    }
}
// page admin
function load_total_donhang(){
    try {
        $conn = pdo_get_connection();
        $sql = "
        SELECT COUNT(*) AS total 
        FROM don_hang";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (($result != 0) ? $result['total'] : 1);
    } catch (PDOException $e) {
        echo "".$e->getMessage();
    } finally {
        unset($conn);
    }
}
function load_page_donhang_hientai($offset, $items_per_page) {
    $sql = "SELECT nguoi_dung.id AS nguoi_dung_id, nguoi_dung.*,don_hang.id AS don_hang_id, don_hang.*,
            trang_thai.id AS trang_thai_id, trang_thai.*
            FROM nguoi_dung
            INNER JOIN don_hang ON nguoi_dung.id = don_hang.iduser
            INNER JOIN trang_thai ON don_hang.id_trang_thai = trang_thai.id
            order by `trang_thai_id` asc
            LIMIT $offset, $items_per_page
            "; // Sử dụng tham số để tránh SQL injection
    try{
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $sp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sp;
    }catch(Exception $e){
        echo "lỗi: ".$e->getMessage();
    }
}
//search
function search_donhang_theo_username($kyw){
    try{
    $sql = "SELECT nguoi_dung.id AS nguoi_dung_id, nguoi_dung.*,don_hang.id AS don_hang_id, don_hang.*,
    trang_thai.id AS trang_thai_id, trang_thai.*
    FROM nguoi_dung
    INNER JOIN don_hang ON nguoi_dung.id = don_hang.iduser
    INNER JOIN trang_thai ON don_hang.id_trang_thai = trang_thai.id";
    if($kyw != ""){
    $sql .= " AND don_hang.ten_nguoi_dung LIKE '%" . $kyw . "%'";    
    }else{
    $sql .= " ORDER BY trang_thai_id ASC";
    }
    $listuser = pdo_query($sql);
    return $listuser;
    }catch(Exception $e){
        echo "".$e->getMessage();
    }
}
// thống kê 
function thongke_donhang() {
    try {
        $conn = pdo_get_connection();
        $sql = "
        SELECT trang_thai.*, COUNT(don_hang.id) AS total
        FROM don_hang
        INNER JOIN trang_thai ON don_hang.id_trang_thai = trang_thai.id
        GROUP BY trang_thai.id
        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "".$e->getMessage();
    } finally {
        unset($conn);
    }
}
function thongke_tien() {
    try {
        $conn = pdo_get_connection();
        $sql = "
        SELECT trang_thai.*,don_hang.id_trang_thai, SUM(don_hang_detail.tong * don_hang_detail.sl) AS total
        , COUNT(trang_thai.id) AS gop
        FROM don_hang
        INNER JOIN trang_thai ON don_hang.id_trang_thai = trang_thai.id
        INNER JOIN don_hang_detail ON don_hang.id = don_hang_detail.id_dh
        GROUP BY don_hang.id_trang_thai, trang_thai.trang_thai

        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo "".$e->getMessage();
    } finally {
        unset($conn);
    }
}
?>