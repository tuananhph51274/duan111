<?php 
if(is_array($dm)){
    extract($dm);
}
?>
<div class="row">
            <div class="row formtitle"><h1>CẬP NHẬT LOẠI HÀNG HÓA</h1></div>
            <div class="row formcontent">
                <form action="index.php?act=updatedm" method="post">
                    <div class="row mb10">
                        MÃ LOẠI <br>
                        <input type="text" name="maloai" disabled>
                    </div>
                    <div class="row mb10">
                        TÊN LOẠI <br>
                        <input type="text" name="tenloai" value="<?php if(isset($name)&&($name!="")) echo $name ?>">
                    </div>
                    <div class="row mb20">
                        <input type="hidden" name="id" value="<?php if(isset($id)&&($id!="")) echo $id ?>">
                        <input type="submit" name="capnhat" value="Cập nhật">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=lisdm"><input type="button" value="danhsach"></a>
                    </div>
                    <?php 
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao; 
                    ?>
                </form>
            </div>
        </div>
    </div>