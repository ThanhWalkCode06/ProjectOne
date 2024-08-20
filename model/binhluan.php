<?php
function insert_binhluan($id_san_pham,$id_nguoi_dung,$noi_dung){
    $sql = "INSERT INTO `binh_luan` (`id_san_pham`, `id_nguoi_dung`, `thoi_gian_binh_luan`, `noi_dung`) VALUES ('$id_san_pham', '$id_nguoi_dung', CURRENT_TIMESTAMP, '$noi_dung')";
    pdo_execute($sql);
}
function delete_binhluan($id){
    $sql = "DELETE FROM binh_luan WHERE `binh_luan`.`id` = $id";
    pdo_execute($sql);
}
function loadAll_binhluan() {
    $sql = "SELECT san_pham.*, nguoi_dung.*,binh_luan.*
            FROM binh_luan
            JOIN nguoi_dung ON binh_luan.id_nguoi_dung = nguoi_dung.id
            JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
            WHERE 1=1;";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function load_binhluan_theo_id($id){
    $sql = "SELECT binh_luan.*, nguoi_dung.*
    FROM nguoi_dung
    JOIN binh_luan ON nguoi_dung.id = binh_luan.id_nguoi_dung
    JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
    Where san_pham.id = $id";
    $dm = pdo_query($sql);
    return $dm;
}
function load_binhluan_theo_id_user($id){
    $sql = "SELECT binh_luan.*, nguoi_dung.*,san_pham.*
    FROM nguoi_dung
    JOIN binh_luan ON nguoi_dung.id = binh_luan.id_nguoi_dung
    JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
    Where nguoi_dung.id = $id";
    $dm = pdo_query($sql);
    return $dm;
}
function update_binhluan($id,$tenloai,$img){
    if($img == ""){
        $sql = "UPDATE `binh_luan` SET `name` = '$tenloai' WHERE `binh_luan`.`id` = $id";
    }else{
        $sql = "UPDATE `binh_luan` SET `name` = '$tenloai', `anh_binh_luan` = '$img' WHERE `binh_luan`.`id` = $id";
    }
    pdo_execute($sql);
    return true;
}
function load_total_cmt(){
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT COUNT(*) AS total FROM binh_luan";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

function load_total_cmt_idsp($id){
    try {
        $conn = pdo_get_connection();
        // if($id == ""){
        $sql = "
        SELECT san_pham.id, COUNT(binh_luan.id) AS total 
        FROM binh_luan
        INNER JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
        WHERE san_pham.id = '$id'
        GROUP BY san_pham.id";
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
function load_total_cmt_iduser($id){
    try {
        $conn = pdo_get_connection();
        // if($id == ""){
        $sql = "
        SELECT nguoi_dung.id, COUNT(binh_luan.id) AS total 
        FROM binh_luan
        INNER JOIN nguoi_dung ON binh_luan.id_nguoi_dung = nguoi_dung.id
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
 
function load_page_cmt_hientai($offset, $items_per_page) {
    $sql = "SELECT binh_luan.id AS binh_luan_id, binh_luan.*, nguoi_dung.*,san_pham.*
            FROM nguoi_dung
            JOIN binh_luan ON nguoi_dung.id = binh_luan.id_nguoi_dung
            JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
            LIMIT :offset, :items_per_page
            "; // Sử dụng tham số để tránh SQL injection

    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->bindValue(':items_per_page', (int)$items_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $sp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sp;
}
function load_page_cmt_hientai_idsp($id,$offset, $items_per_page) {
    $sql = "SELECT binh_luan.*, nguoi_dung.*,san_pham.id
            FROM nguoi_dung
            JOIN binh_luan ON nguoi_dung.id = binh_luan.id_nguoi_dung
            JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
            WHERE san_pham.id = $id
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
function load_page_cmt_hientai_iduser($id,$offset, $items_per_page) {
    $sql = "SELECT binh_luan.*, nguoi_dung.*,san_pham.*
            FROM nguoi_dung
            JOIN binh_luan ON nguoi_dung.id = binh_luan.id_nguoi_dung
            JOIN san_pham ON binh_luan.id_san_pham = san_pham.id
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
function search_cmt_theo_username($kyw){
    try{
    $sql = "SELECT nguoi_dung.*,san_pham.*, binh_luan.id AS binh_luan_id, binh_luan.*
    FROM nguoi_dung
    INNER JOIN binh_luan ON nguoi_dung.id = binh_luan.id_nguoi_dung 
    INNER JOIN san_pham ON binh_luan.id_san_pham = san_pham.id 
    ";
    if($kyw != ""){
    $sql .= " AND nguoi_dung.tai_khoan LIKE '%" . $kyw . "%'";    
    }else{
    $sql .= " ORDER BY sp.id DESC";
    }
    $listuser = pdo_query($sql);
    return $listuser;
    }catch(Exception $e){
        echo "".$e->getMessage();
    }
}
?>