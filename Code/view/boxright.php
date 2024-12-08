
<div class="row mb">
    <div class="boxtitle">
        TÀI KHOẢN
    </div>
    <div class="boxcontent formtaikhoan">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user']);       ?>
            <div class="row mb10">
                XIN CHÀO <br>
                <?= $user ?>
                <!-- <input type="text" name="user"> -->
            </div>
            <div class="row mb10">
                <li><a href="index.php?act=quenmk">QUÊN MẬT KHẨU</a></li>
                <li><a href="index.php?act=edit_taikhoan">CẬP NHẬT THÔNG TIN TÀI KHOẢN</a></li>
<?php if($role==1){ ?>
                <li><a href="admin/index.php">ĐĂNG NHẬP ADMIN</a></li>
<?php } ?>
                <li><a href="index.php?act=thoat">THOÁT</a></li>
            </div>
        <?php
        } else {
        ?>
            <form action="index.php?act=dangnhap" method="post"  id="loginForm">
                <div class="row mb10">
                    Tên Đăng Nhập <br>
                    <input type="text" name="user" id="user">
                </div>
                <div class="row mb10">
                    Mật Khẩu <br>
                    <input type="password" name="pass" id="pass">
                </div>
                <div class="row mb10">
                    <input type="checkbox">Ghi nhớ tài khoản
                </div>
                <div class="row mb10">
                    <input type="submit" value="ĐĂNG NHẬP" name="dangnhap">
                </div>
              

            </form>
            <li><a href="#">QUÊN MẬT KHẨU</a></li>
            <li><a href="index.php?act=dangky">ĐĂNG KÍ THÀNH VIÊN</a></li>
        <?php } ?>
        
    </div>
</div>
<div class="row mb">
    <div class="boxtitle">
        DANH MỤC
    </div>
    <div class="boxcontent2 menudoc">
        <ul>
            <?php foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=sanpham&iddm=" . $id;
                echo  '<li><a href="' . $linkdm . '">' . $name . '</a></li>';
            } ?>
            <!-- <li><a href="#">VALI Người lớn</a></li>
                            <li><a href="#">VALI Trẻ em</a></li>
                            <li><a href="#">VALI Cao Cấp</a></li>
                            <li><a href="#">VALI Thường</a></li>
                            <li><a href="#">VALI Tiện lợi</a></li>
                            <li><a href="#">VALI Nhựa cứng</a></li> -->

        </ul>
    </div>
    <div class="boxfooter searbox">
        <form action="index.php?act=sanpham" method="post">
            <input type="text" name="kyw" id="">
            <input type="submit" name="timkiem" value="TÌM KIẾM">
        </form>
    </div>
</div>
<div class="row">
    <div class="boxtitle">
        TOP 10 YÊU THÍCH
    </div>
    <div class=" row boxcontent">
        <?php foreach ($dstop10 as $sp) {
            extract($sp);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $img = $img_path . $img;
            echo ' <div class="row mb10 top10">
                         <a href="' . $linksp . '"><img src="' . $img . '" alt=""></a>
                        <a href="' . $linksp . '">' . $name . '</a>
                    </div>';
        } ?>
        <!-- <div class="row mb10 top10">
                        <img src="view/img/vali3.webp" alt="">
                        <a href="#">VALI TRẺ EM</a>
                    </div>
                    <div class="row mb10 top10">
                        <img src="view/img/vali5.webp" alt="">
                        <a href="#">VALI CAO CẤP</a>
                    </div>
                    <div class="row mb10 top10">
                        <img src="view/img/vali4.webp" alt="">
                        <a href="#">VALI NGƯỜI LỚN</a>
                    </div>
                    <div class="row mb10 top10">
                        <img src="view/img/vali6.webp" alt="">
                        <a href="#">VALI THƯỜNG</a>
                    </div>
                    <div class="row mb10 top10">
                        <img src="view/img/vali7.webp" alt="">
                        <a href="#">VALI NHỰA CỨNG</a>
                    </div>
                    <div class="row mb10 top10">
                        <img src="view/img/vali6.webp" alt="">
                        <a href="#">VALI SALE</a>
                    </div>
                    <div class="row mb10 top10">
                        <img src="view/img/vali7.webp" alt="">
                        <a href="#">VALI TIỆN LỢI</a>
                    </div> -->
    </div>
</div>