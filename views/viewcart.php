
<!-- END HEADER -->
<main class="catalog  mb ">

<div class="breadcrumb-area bg-img" style="background-image:url(assets/images/bg/breadcrumb.jpg);">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Giỏ hàng</h2>
            <ul>
                <li>
                    <a href="index.php?act=home">Home</a>
                </li>
                <li class="active">cart </li>
            </ul>
        </div>
            </div>
        </div>
    <div class="boxleft">
        <div class="text-danger mb-3">
        </div>
        <div class="box_title"><h2>THÔNG TIN GIỎ HÀNG</h2></div>
        <div class="box_content">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Thao tác</th>
                </tr>
                </thead>
                 <tbody>
        <?php
        $tong=0;
        $i = 0;
        foreach ($_SESSION['giohang'] as $item) {
            $img_path="upload/";
            $hinh = $img_path . $item[2];
            $tt=$item[3] * $item[4];
            $tong += $tt;
            $xoa = '<a class="btn btn-outline-success"  href="index.php?act=delCart&idcart=' . $i . '">Xóa</a>';
            
            echo '<tr>
                        <td>'.($i+1).'</td>
                        <td><a href="index.php?act=detail_sp&id='.$item[0].'">'.$item[1].'</a></td>
                        <td><img src="' . $hinh . '" alt="" height="100" width="100"></td>
                        <td class="gia">'.number_format($item[3], 0, ',', '.').'VNĐ</td>
                        <td><input class="inputNum" type="number" value="'.$item[4].'" min=1 data-id="'.$i.'"></td>
                        <td class="tt">'.number_format($tt, 0, ',', '.').'VNĐ</td>
                        <td>
                            ' . $xoa . '
                        </td>
                  </tr>';
                $i++;  
        }
        ?>
    </tbody>
            </table>
            <div class="row">
            <div class="col-9">
                    <strong><a href="#"></a></strong>
                </div>
                <div class="col-2">
                    <strong>Tiền phải trả: <strong class="tongTien"><?php echo number_format($tong, 0, ',', '.'); ?></strong>VNĐ </strong>
                </div>
            <div  class="cart-shiping-update-wrapper">
                <div  class="cart-shiping-update">
                    <p style="margin-left:15px;color:red"><?php echo (empty($_SESSION['giohang']))? "Chưa có sản phẩm nào  (´。＿。｀)" :""?></p>
                    <a href="index.php?act=shop">Tiếp tục mua hàng</a>
                </div>
                <div class="cart-clear">
                <a href="index.php?act=donhang">Mua hàng</a>
                <a href="index.php?act=delcart">Xóa và quay về</a>
                </div>
            </div>
            </div>
        </div>
    </div>
    
</main>
<script>
document.querySelectorAll('.inputNum').forEach(input => {
    input.addEventListener('change', function() {
        const id = this.dataset.id;
        const quantity = this.value;

        // Gửi yêu cầu AJAX đến server để cập nhật số lượng
        fetch('views/cart/update_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id, quantity })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Cập nhật giá trị thành tiền và tổng tiền
                this.closest('tr').querySelector('.tt').textContent = new Intl.NumberFormat('vi-VN').format(data.item_total) + 'VNĐ';
                document.querySelector('.tongTien').textContent = new Intl.NumberFormat('vi-VN').format(data.cart_total) + 'VNĐ';
            }
        })
        .catch(error => console.error('Error:', error));
    });
});

    </script>

