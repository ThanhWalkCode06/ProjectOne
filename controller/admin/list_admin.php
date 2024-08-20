<div class="page-wrapper" style="margin-top:30px;">
<h1>Danh sách người dùng </h1>
<div class="sidebar-widget">
        <h4 class="sidebar-title">Tìm kiếm <?php echo isset($kyw) ? $kyw : ""; ?></h4>
        <div class="sidebar-search mb-40 mt-20">
            <form class="sidebar-search-form" action="index.php?act=list_user" method="post">
                <input type="text" placeholder="Tìm kiếm ở đây..." name="kyw">
                <input type="submit" name="search">
            </form>
        </div>
</div>
<table  class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên tài khoản</th>
      <th scope="col">Email người dùng</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Chức vụ người dùng</th>
      <th scope="col">Opt</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    $stt = 0;
    foreach($list as $item){
    ?>
    <tr>
      <td scope="row"><?php echo $stt++?></td>
      <td><?php echo $item['tai_khoan']?></td>
      <td><?php echo $item['email']?></td>
      <td><?php echo $item['sdt']?></td>
      <td><?php echo ($item['id_chuc_vu'] == 2) ? "admin" : "user" ?></td>
      <td> 
        
        <?php if($item['id_chuc_vu'] == 1){if($item['ban'] == 0 ){?>
          <a style="color:black;" href="index.php?act=ban_user&id=<?php echo $item['id']?>">Khóa</a>
          <?php }else{?>
            <a style="color:black;" href="index.php?act=ban_user&id_open=<?php echo $item['id']?>">Mở khóa</a>
          <?php }}?>
      </td>
    </tr>
    <?php
    }
    ?>
    <button style="margin-top:20px" type="button" class="btn btn-primary" ><a href="index.php?act=add_admin">Thêm admin</a></button>
  </tbody>
</table>


</table>
</div>    
