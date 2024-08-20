<?php

$id_don_hang = $_GET['id']; // ID của đơn hàng bạn muốn lấy chi tiết

$sql = "
    SELECT 
        don_hang.id AS don_hang_id, 
        san_pham.*, 
        don_hang_detail.sl
    FROM 
        don_hang
    INNER JOIN 
        don_hang_detail ON don_hang.id = don_hang_detail.id_dh
    INNER JOIN 
        san_pham ON don_hang_detail.id_sp = san_pham.id
    WHERE 
        don_hang.id = :id_don_hang
";

// Chuẩn bị và thực thi câu lệnh SQL với PDO để tránh SQL injection
try {
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_don_hang', $id_don_hang, PDO::PARAM_INT);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($results)) {
        echo "Đơn hàng ID: " . $results[0]['don_hang_id'] . "\n";
        foreach ($results as $row) {
            echo "Sản phẩm: " . $row['ten_san_pham'] . " x" . ($row['so_luong']-$row['sl']) . "\n";
        }
    } else {
        echo "Không tìm thấy chi tiết cho đơn hàng ID: $id_don_hang";
    }
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>