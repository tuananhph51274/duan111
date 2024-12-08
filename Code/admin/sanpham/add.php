<div class="row"></div>
            <div class="row formtitle"><h1>THÊM MỚI SẢN PHẨM</h1></div>
            <div class="row formcontent">
                <form action="index.php?act=addsp" method="post" enctype="multipart/form-data">
                    <div class="row mb10">
                        Danh mục<br>
                        <select name="iddm" >
                            <?php 
                            foreach($listdanhmuc as $danhmuc){
                                extract($danhmuc);
                                echo '<option value="'.$id.'">'.$name.'</option>';
                            }
                            ?>
                            
                        </select>
                    </div>
                    <div class="row mb10">
                        TÊN SẢN PHẨM <br>
                        <input type="text" name="tensp">
                    </div>
                    <div class="row mb10">
                        GIÁ <br>
                        <input type="text" name="giasp">
                    </div>
                    <div class="row mb10">
                        HÌNH <br>
                        <input type="file" name="hinh">
                    </div>
                    <div class="row mb10">
                        MÔ TẢ<br>
                       <textarea name="mota" id=""></textarea>
                    </div>
                    <div class="row mb20">
                        <input type="submit" name="themmoi" value="Thêm mới">
                        <input type="reset" value="Nhập lại">
                        <a href="index.php?act=listsp"><input type="button" value="danhsach"></a>
                    </div>
                    <?php 
                    if(isset($thongbao)&&($thongbao!="")) echo $thongbao; 
                    ?>
                </form>
            </div>
        </div>
    </div>