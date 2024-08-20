<div class="page-wrapper" style="margin-top:30px;">
<div class="sidebar-widget">
<form style="display:gird;place-items:center;" action="">
    <h3>Thông tin đơn hàng</h3>
    <p><?php echo "Mã đơn hàng : ".$detail_dh[0]['madh'] ?></p>
    <p><?php echo "Tên người đặt : ".$detail_dh[0]['ten_nguoi_dung'] ?></p>
    <?php $tong=0; foreach($detail_dh as $item){?>
    <p><?php  echo "Sản phẩm : " . $item['ten_san_pham'],"<br>". " Giá: " .number_format($item['gia_san_pham'],'0','','.')." x " . $item['sl'] . "\n"; ?></p>
    <img style="width:50px;height:50px" src="../upload/<?php echo $item['anh_san_pham']?>" alt=""> 
    <?php $tong += ($item['gia_san_pham'] * $item['sl']); }
    ?>
    <p><?php echo "Địa chỉ : ".$detail_dh[0]['dia_chi'] ?></p>
    <p><?php echo "Số điện thoại : ".$detail_dh[0]['so_dien_thoai'] ?></p>
    <p><?php echo "Tổng: ".(number_format($tong,'0','','.')) ;
    // echo "<pre>";
    // print_r($detail_dh);
    // echo "</pre>";
    ?><span style="color:red"> VNĐ</span></p>
    
    </form>
    <button style="height:40px" type="button" class="btn btn-danger"><a style="color:white" href="index.php?act=list_donhang">Quay về</a></button>
    </div>
</div>
</div>