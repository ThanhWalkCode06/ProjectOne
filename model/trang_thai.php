<?php
function loadAll_tt(){
    $sql = "SELECT * FROM `trang_thai` order by `id` desc ";
    $list_trangthai = pdo_query($sql);
    return $list_trangthai;
}

?>