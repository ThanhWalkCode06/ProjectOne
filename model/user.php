<?php
function insert_user($user,$pass,$email,$sdt){
    $sql = "INSERT INTO `nguoi_dung` (`tai_khoan`, `mat_khau`, `email`, `id_chuc_vu`, `sdt`) VALUES ('$user', '$pass', '$email', '1', '$sdt')";
    pdo_execute($sql);
    return true;
}
function insert_admin($user,$pass,$email,$sdt){
    $sql = "INSERT INTO `nguoi_dung` (`tai_khoan`, `mat_khau`, `email`, `id_chuc_vu`, `sdt`) VALUES ('$user', '$pass', '$email', '2', '$sdt')";
    pdo_execute($sql);
    return true;
}

function delete_user($id){
    $sql = "DELETE FROM nguoi_dung WHERE `nguoi_dung`.`id` = $id";
    pdo_execute($sql);
}
function loadAll_user(){
    $sql = "SELECT `nguoi_dung`.*,`chuc_vu`.ten_chuc_vu
    from `nguoi_dung`
    join `chuc_vu` on  `nguoi_dung`.id_chuc_vu = `chuc_vu`.id
    order by `id` desc ";
    $listuser = pdo_query($sql);
    return $listuser;
}
function loadOne_user($id){
    $sql = "SELECT * FROM `nguoi_dung` WHERE `id`={$id}";
    $dm = pdo_query_one($sql);
    return $dm;
}
function block_user($id,$ban){
    $sql = "UPDATE `nguoi_dung` SET `ban` = '$ban' WHERE `nguoi_dung`.`id` = $id";
    pdo_execute($sql);
    return true;
}
function update_user($id,$tenloai,$img){
    if($img == ""){
        $sql = "UPDATE `nguoi_dung` SET `name` = '$tenloai' WHERE `nguoi_dung`.`id` = $id";
    }else{
        $sql = "UPDATE `nguoi_dung` SET `name` = '$tenloai', `anh_nguoi_dung` = '$img' WHERE `nguoi_dung`.`id` = $id";
    }
    pdo_execute($sql);
    return true;
}
function update_diachi($id,$sdt,$diachi){
    $sql = "UPDATE `nguoi_dung` SET `sdt` = '$sdt', `dia_chi` = '$diachi' WHERE `nguoi_dung`.`id` = $id";
    pdo_execute($sql);
    return true;
}
function update_pass($id,$pass){
    $sql = "UPDATE `nguoi_dung` SET `mat_khau` = '$pass' WHERE `nguoi_dung`.`id` = $id";
    
    pdo_execute($sql);
    return true;
}
function load_page_user_hientai($offset, $items_per_page) {
    $sql = "SELECT nguoi_dung.* 
            FROM nguoi_dung 
            LIMIT :offset, :items_per_page"; // Sử dụng tham số để tránh SQL injection

    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $stmt->bindValue(':items_per_page', (int)$items_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $sp = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $sp;
}
function load_total_user(){
    try {
        $conn = pdo_get_connection();
        $sql = "SELECT COUNT(*) AS total FROM nguoi_dung";
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
function search_user($user){
    $sql = "SELECT nguoi_dung.*
    FROM nguoi_dung
    WHERE 1=1";
    if($user != ""){
    $sql .= " AND nguoi_dung.tai_khoan LIKE '%" . $user . "%'";    
    }else{
    $sql .= " ORDER BY sp.id DESC";
    }
    $listuser = pdo_query($sql);
    return $listuser;
}
// function search_cmt($user){
//     $sql = "SELECT san_pham.*, nguoi_dung.*,binh_luan.*
//     FROM san_pham
//     JOIN danh_muc dm ON san_pham.id_danh_muc = dm.id
//     WHERE 1=1";
//     if($user != ""){
//     $sql .= " AND nguoi_dung.tai_khoan LIKE '%" . $user . "%'";    
//     }else{
//         $user = "";
//     }
//     $sql .= " ORDER BY sp.id DESC";
//     $listsanpham = pdo_query($sql);
//     return $listsanpham;
// }
?>