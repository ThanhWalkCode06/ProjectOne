<?php
function taodonhang_detail($id_sp,$id_dh,$sl,$tong){
    try{
        $sql = "INSERT INTO `don_hang_detail` (`id_sp`, `id_dh`, `sl`, `tong`) 
    VALUES ('$id_sp', '$id_dh', '$sl', '$tong')";
    pdo_execute($sql);
    }catch(Exception $e){
        echo "Error: ". $e->getMessage();
    }
}
function delete_donhang_detail($id) {
    $sql = "DELETE  FROM don_hang_detail WHERE don_hang_detail.id_dh =" . $id;
    pdo_execute($sql);
}
// function tongdonhang_detail($id)
// {
//     $sql = "
//     SELECT 
//         don_hang.id AS don_hang_id, 
//         don_hang.*, 
//         SUM(don_hang_detail.tong * don_hang_detail.sl) AS total
//     FROM 
//         don_hang
//     INNER JOIN 
//         don_hang_detail ON don_hang.id = don_hang_detail.id_dh
//     WHERE 
//         don_hang.id = ?
//     GROUP BY 
//         don_hang.id
//     ";

//     try {
//         $conn = pdo_get_connection();
//         $stmt = $conn->prepare($sql);
//         $stmt->execute([$id]);
//         $result = $stmt->fetch(PDO::FETCH_ASSOC);
//         return $result;
//     } catch (PDOException $e) {
//         echo "Lỗi: " . $e->getMessage();
//         return [];
//     } finally {
//         unset($conn);
//     }
// }
function loadone_bill_detail($id)
{
    try{
    $sql = "
    SELECT 
        don_hang.id AS don_hang_id,don_hang.*,
        san_pham.id AS san_pham_id, san_pham.*, 
        don_hang_detail.*
    FROM 
        don_hang
    INNER JOIN 
        don_hang_detail ON don_hang.id = don_hang_detail.id_dh
    INNER JOIN 
        san_pham ON don_hang_detail.id_sp = san_pham.id
    WHERE 
        don_hang.id = $id
";
    return  pdo_query($sql); 
    }catch(Exception $e){
        echo "".$e->getMessage();
    }
}

?>