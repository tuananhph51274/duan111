
<!--                    -->
<div class="row mb">
    <div class="boxtrai mr">
    <div class="boxtitle">CẢM ƠN</div>
       <div class="row boxcontent" style="text-align: center;">
        <h2>CẢM ƠN QUÝ KHÁCH ĐÃ ĐẶT HÀNG</h2>
       </div>
       <?php
if (isset($viewbill) && (is_array($viewbill))){
    extract($viewbill);

    
}
 
?>
 <div class="boxtitle">THÔNG TIN ĐƠN HÀNG</div>
    <div class="row boxcontent" style="text-align: center;">
        <li>-Mã đơn hàng: DAM-<?php echo $viewbill[0]["id"];?></li>
        <li>-Ngày đặt hàng: <?php echo $viewbill[0]['ngaydathang'];?></li>
        <li>-Tổng đơn hàng: <?php echo $viewbill[0]['total'];?></li>
        <li>-Phương thức thanh toán: <?php echo $viewbill[0]['bill_pttt'];?></li>
    </div>
    <div class="boxtitle">THÔNG TIN ĐẶT HÀNG</div>
    <div class="row boxcontent billform ">
        <table>
            <tr>
                <td>Người đặt hàng</td>
                <td><?php echo $viewbill[0]['bill_name']?></td>
            </tr>
            <tr>
                <td>Địa chỉ</td>
                <td><?php echo $viewbill[0]['bill_address']?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $viewbill[0]['bill_email']?></td>
            </tr>
            <tr>
                <td>Số điện thoại</td>
                <td><?php echo $viewbill[0]['bill_tel']?></td>
            </tr>
        </table>
    </div>

    <div class="boxtitle">CHI TIẾT GIỎ HÀNG</div>
    <div class="row boxcontent cart">
        <table>
            <tr>
                <th>STT</th>
                <th>Hình</th>
                <th>Sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php
            // bill_chi_tiet($billct)
            ?>
        </table>
    </div>
    </div>

    <!--  -->
    <div class="boxphai">
        <?php include "view/boxright.php" ?>
    </div>
</div>
