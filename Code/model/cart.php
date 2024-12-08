<?php

function viewcart($del){
    global $img_path;
    $tong=0;  
    $i=0;/**số thứ tự sản phẩm */
    if($del==1){
        $xoasp_th='<th>THAO TÁC</th>';
        $xoasp_td2='<td></td>';
     }else{
        $xoasp_th='';
        $xoasp_td2='';
     }
    echo ' <tr>
                <th>HÌNH</th>
                <th>SẢN PHẨM</th>
                <th>ĐƠN GIÁ</th>
                <th>SỐ LƯỢNG</th>
                <th>THÀNH TIỀN</th>
                '. $xoasp_th.'
            </tr>';

     foreach ($_SESSION['mycart'] as $cart) {
         $hinh=$img_path.$cart[2];
         $ttien=$cart[3]*$cart[4];
         $tong=$tong+$ttien;
         if($del==1){
            $xoasp_td='<td><a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"> </a></td>';
         }else{
            $xoasp_td='';
         }
        
         echo '   
                <tr>
                     <td><img src="'.$hinh.'" alt="" height="80px"></td>
                     <td>'.$cart[1].'</td>
                     <td>'.$cart[3].'</td>
                     <td>'.$cart[4].'</td>
                     <td>'.$ttien.'</td>
                     '.$xoasp_td.'
               </tr>';
         $i+=1;
     }
     echo '<tr>
                <td colspan="4"> TỔNG ĐƠN HÀNG</td>
                 <td>'.$tong.'</td>
                 '. $xoasp_td2.'
         </tr>' ;
}
function tongdonhang(){
   $tong=0;  
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien=$cart[3]*$cart[4];
        $tong=$tong+$ttien;
  
    }
    return $tong;
   }
   function insert_bill($name,$email,$address,$tel,$pttt,$ngaydathang,$tongdonhang){
      $sql ="insert into bill(bill_name,bill_email,bill_address,bill_tel,bill_pttt,ngaydathang,total) values('$name','$email','$address','$tel','$pttt','$ngaydathang','$tongdonhang')";
      return pdo_execute_return_lastInsertId($sql);

  }

  function select_bill($idbill){
   $sql ="select * from bill where id=".$idbill;
   $listbill=pdo_query($sql);
   return $listbill;

}
?>