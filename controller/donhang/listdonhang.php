
<div class="page-wrapper" style="margin-top:30px;">
<h1 >Danh sách đơn hàng</h1>
<div class="sidebar-widget">
        <h4 class="sidebar-title">Tìm kiếm <?php echo isset($kyw) ? $kyw : ""; ?></h4>
        <div class="sidebar-search mb-40 mt-20">
            <form class="sidebar-search-form" action="index.php?act=list_donhang" method="post">
                <input type="text" placeholder="Tìm kiếm ở đây..." name="kyw">
                <input type="submit" name="search">
            </form>
        </div>
</div>
    <table class="table"  style=" width:1260px;">
        <thead class="thead-dark">
        <tr>
            <th scope="col" >STT</th>
            <th scope="col">Mã đơn hàng</th>
            <th scope="col">Tên khách hàng</th>
            <th scope="col">Địa chỉ khách hàng</th>
            <th scope="col">Số điện thoại khách hàng</th>
            <th scope="col">Phương thức thanh toán</th>
            
            <th scope="col">Ngày đặt hàng</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Opt</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $items_per_page = 8;
        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($current_page - 1) * $items_per_page;
        $total_items = load_total_donhang();
        $total_pages = ceil($total_items / $items_per_page);
        $listdonhang = load_page_donhang_hientai($offset, $items_per_page);
        $stt = 1; 
        foreach ((isset($list_search) ? $list_search : $listdonhang) as $item) {
            ?>
            <tr style="height:135px">
                <th style="height:100px;width:100px" scope="row"><?php echo $stt++; ?></th>
                <td style="height:100px;width:100px"><?php echo $item['madh']; ?></td>
                <td style="height:100px;width:100px"><?php echo $item['ten_nguoi_dung'] ?></td>
                <td style="height:100px;width:100px"><?php echo $item['dia_chi']; ?></td>
                <td style="height:100px;width:100px"><?php echo $item['so_dien_thoai']; ?></td>
                <td style="height:100px;width:100px"><?php echo ($item['pttt']) == 1 ? "Thanh toán trực tiếp" : "Thanh toán chuyển khoản"; ?></td>
                
                <td style="height:100px;width:100px"><?php echo $item['ngaydathang'];?> </td>
                <td style="height:100px;width:100px">
                    <form action="index.php?act=list_donhang" method="post">
                    <input type="hidden" name = "id" value = "<?php echo $item['don_hang_id']?>">
                    <select style="width:150px" name="tt" id="">
                        <?php if($item['id_trang_thai'] == 2 || $item['id_trang_thai'] == 4 ){ ?>
                        <option value="<?php echo $item['id_trang_thai'] ?>"><?php echo $item['trang_thai'] ?></option> 
                        <?php ?>
                        <option name="tt" value="<?php echo $list_tt[0]['id'] ?>"><?php echo $list_tt[0]['trang_thai'] ?></option>
                        <!-- <option name="tt" value="<?php echo $list_tt[3]['id'] ?>"><?php echo $list_tt[3]['trang_thai'] ?></option> -->
                        <!-- <option name="tt" value="<?php echo $list_tt[4]['id'] ?>"><?php echo $list_tt[4]['trang_thai'] ?></option> -->
                        <option name="tt" value="<?php echo $list_tt[1]['id'] ?>"><?php echo $list_tt[1]['trang_thai'] ?></option>
                        <!-- <option name="tt" value="<?php echo $list_tt[0]['id'] ?>"><?php echo $list_tt[0]['trang_thai'] ?></option> -->
                        <?php 
                            
                        ?>
                        <?php }else if($item['id_trang_thai'] == 5){ ?>
                            <option value="<?php echo $item['id_trang_thai'] ?>"><?php echo $item['trang_thai'] ?></option>
                            <!-- <option name="tt" value="<?php echo $list_tt[1]['id'] ?>"><?php echo $list_tt[1]['trang_thai'] ?></option> -->
                        <?php }else if($item['id_trang_thai'] == 1){ ?>
                            <option value="<?php echo $item['id_trang_thai'] ?>"><?php echo $item['trang_thai'] ?></option>   
                            <option name="tt" value="<?php echo $list_tt[3]['id'] ?>"><?php echo $list_tt[3]['trang_thai'] ?></option>
                            <option name="tt" value="<?php echo $list_tt[2]['id'] ?>"><?php echo $list_tt[2]['trang_thai'] ?></option>  
                        <?php }else{?>
                        <option value="<?php echo $item['id_trang_thai'] ?>"><?php echo $item['trang_thai'] ?></option>    
                        <!-- <option name="tt" value="<?php echo $list_tt[2]['id'] ?>"><?php echo $list_tt[2]['trang_thai'] ?></option>    -->
                        <!-- <option name="tt" value="<?php echo $list_tt[3]['id'] ?>"><?php echo $list_tt[3]['trang_thai'] ?></option>    -->
        
                        <?php } ?>
                    </select>
                    <input style="height:26px;width:79px;line-height:20px" type="submit" name="confirm" value="xác nhận">
                    </form>
                    <!-- <p><?php echo "<pre>"; print_r($list_tt); echo "</pre>";  ?></p> -->
                    <!-- <p><?php echo $list_tt[3]['id'] ?></p> -->
                </td>
                <td style="height:100px;width:100px">
                    <?php if($item['id_trang_thai'] == 3){  ?>
                        <a style="color:black" href="index.php?act=dele_don&id=<?php echo $item['don_hang_id']?>; ?>" onclick="return confirm('Bạn có chắc chắn xóa đơn hàng này không?')">Xóa</a><br>
                    <?php }?> 
                    <a style="color:black" href="index.php?act=view_detail&id=<?php echo $item['don_hang_id']?>">Xem chi tiết </a>  
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <ul style="list-style:none;display: flex;justify-content: center;">
    <?php if ($current_page > 1) { ?>
        <li><a id="page_item" style="color:black" class="prev" href="index.php?act=list_donhang&page=<?php echo $current_page - 1; ?>"><i class="la la-angle-left"></i></a></li>
    <?php } ?>

    <?php if ($current_page > 3) { ?>
        <li><a id="tab_pre" href="index.php?act=list_donhang&page=1">1</a></li>
        <?php if ($current_page > 4) { ?>
            <li>...</li>
        <?php } ?>
    <?php } ?>

    <?php
    for ($page = max(1, $current_page - 2); $page <= min($total_pages, $current_page + 2); $page++) {
    //     for ($page = 1; $page <= $total_pages; $page++){    
        ?>    
        <li><a id="<?php echo $page == $current_page ? 'active' : 'tab_pre'; ?>" href="index.php?act=list_donhang&page=<?php echo $page; ?>"><?php echo $page?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages - 2) { ?>
        <li>...</li>
        <li><a id="tab_pre" href="index.php?act=list_donhang&page=<?php echo $total_pages; ?>"><?php echo $total_pages; ?></a></li>
    <?php } ?>

    <?php if ($current_page < $total_pages) { ?>
        <li><a id="page_item" style="color:black" class="next" href="index.php?act=list_donhang&page=<?php echo $current_page + 1; ?>"><i class="la la-angle-right"></i></a></li>
    <?php } ?>
  </ul>

</div>

