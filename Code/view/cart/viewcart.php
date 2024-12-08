<div class="row mb">
    <div class="boxtrai mr">
    <div class="row mb">
        <div class="boxtitle">GIỎ HÀNG</div>
        <div class="row boxcontent cart formdsloai">
        <table>
           
               <?php
                 viewcart(1);
               ?>
               <!-- <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>
               <tr>
                    <td>1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
               </tr>     -->
         
        </table>
        </div>
    </div> 
    <div class="row mb view">
    <a href="index.php?act=bill"><input type="button" value="TIẾP TỤC ĐẶT HÀNG"></a> <a href="index.php?act=delcart"> <input type="button" value="XÓA GIỎ HÀNG"></a>
       </div>  
    </div>
    <div class="boxphai">
        <?php include "view/boxright.php";?>
    </div>
</div>