<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $quantity = $data['quantity'];

    // Cập nhật số lượng sản phẩm trong session
    if (isset($_SESSION['giohang'][$id])) {
        $_SESSION['giohang'][$id][4] = $quantity;

        // Tính toán giá tiền mới
        $item_price = $_SESSION['giohang'][$id][3];
        $item_total = $item_price * $quantity;
        $cart_total = array_reduce($_SESSION['giohang'], function ($sum, $item) {
            return $sum + ($item[3] * $item[4]);
        }, 0);

        echo json_encode([
            'success' => true,
            'item_total' => $item_total,
            'cart_total' => $cart_total
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>