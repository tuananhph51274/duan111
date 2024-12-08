<div class="row mb">
    <div class="boxtrai mr">
    
     <form action="index.php?act=billcomfirm" method="post">
      <div class="row mb">
      <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
       <div class="row boxcontent billform formdsloai">

            <table>
              <?php

              if(isset($_SESSION['user'])){
                $name = $_SESSION['user']['user'];
                $address = $_SESSION['user']['address'];
                $email = $_SESSION['user']['email'];
                $tel = $_SESSION['user']['tel'];
              }else{
                $name = "";
                $address = "";
                $email ="";
                $tel = "";
              }

              ?>
               <tr>
                <td>Người đặt hàng</td>
                <td><input type="text" name="name" value="<?=$name ?>"></td>
               </tr>
               <tr>
                <td>ĐỊA CHỈ</td>
                <td><input type="text" name="address" value="<?=$address ?>"></td>
               </tr>
               <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?=$email ?>"></td>
               </tr>
               <tr>
                <td>ĐIỆN THOẠI</td>
                <td><input type="text" name="tel" value="<?=$tel ?>" ></td>
               </tr>
            </table>

        </div>
      </div>
      <div class="row mb">
        <div class="boxtitle">PHƯƠNG THỨC THANH TOÁN</div>
        <div class="row boxcontent">
            <table>

             <tr>
                <td><input type="radio" value="1" name="pttt" id="" checked>trả tiền khi nhận hàng</td>
                <td><input type="radio" value="2" name="pttt" id="">chuyển khoản ngân hàng</td>
                <td><input type="radio" value="3" name="pttt" id="">Thanh toán online</td>
             </tr>

            </table>
        </div>
      </div>

      <div class="row mb">
        <div class="boxtitle">THÔNG TIN GIỎ HÀNG</div>
        <div class="row boxcontent cart formdsloai">
            <table>
                
               
                 <?php
                viewcart(0);
                 ?>
            </table>
        </div>
      </div>
        <div class="row mb bill">
            <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" name="dongydathang">
        </div>
     </form>

    </div>
    <div class="boxphai">
        <?php include "view/boxright.php" ?>
    </div>
</div>