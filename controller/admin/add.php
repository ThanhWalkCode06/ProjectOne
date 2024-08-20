<div class="page-wrapper" style="margin-top:30px;">
    <h1>Thêm admin </h1>
    <form action="index.php?act=add_admin" method="post" >
        <div class="mb-3">
            <label class="form-label">Tên tài khoản :</label>
            <input type="text" class="form-control" name="tk" placeholder="Tên tài khoản">
        </div>
        <div class="mb-3">
            <label class="form-label">Mật khẩu:</label>
            <input type="text" class="form-control" name="pass" placeholder="Mật khẩu">
            
        </div>
        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
            
        </div>
        <div class="mb-3">
            <label class="form-label">Sdt:</label>
            <input type="number" class="form-control" name="sdt">
           
        </div>
        <p style="color:red"><?php
        if (isset($check_re)) {
            echo $check_re;
        }
        ?></p>
        <button type="submit" class="btn btn-primary" name="dangky">Thêm admin</button>
        <button class="btn btn-primary" name="back"><a href="index.php?act=list_user">Quay về</a></button>
    </form>

</div>


