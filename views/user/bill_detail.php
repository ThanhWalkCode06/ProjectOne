<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="width:100%;height:1000px;display:flex;justify-content:center;margin-top:200px">
    <form style="width:450px;display:gird;place-items:center;border:solid 1px #ccc;border-width: thick;" action="">
    <h3>Thông tin đơn hàng</h3>
    <p><?php echo "Mã đơn hàng : ".$detail_dh[0]['madh'] ?></p>
    <p><?php echo "Tên người đặt : ".$detail_dh[0]['ten_nguoi_dung'] ?></p>
    <?php $tong = 0; foreach($detail_dh as $item){?>
    <p><?php  echo 'Sản phẩm  : ' .$item['ten_san_pham'],"<br>". " Giá: " .number_format($item['gia_san_pham'],'0','','.')." VNĐ x " . $item['sl'] . "\n"; ?></p>
    <img style="width:50px;height:50px" src="upload/<?php echo $item['anh_san_pham']?>" alt=""> 
        
    <?php $tong += ($item['gia_san_pham'] * $item['sl']); }
    ?>
    <p><?php echo "Địa chỉ : ".$detail_dh[0]['dia_chi'] ?></p>
    <p><?php echo "Số điện thoại : ".$detail_dh[0]['so_dien_thoai'] ?></p>
    <p><?php echo "Tổng giá trị: ".(number_format($tong,'0','','.')) ?><span style="color:red"> VNĐ</span></p>
    
    </form>
    <button style="height:40px;margin-left:20px" type="button" class="btn btn-danger"><a style="color:white" href="index.php?act=don_hang_user">Quay về</a></button>
    </div>
</body>
</html>



