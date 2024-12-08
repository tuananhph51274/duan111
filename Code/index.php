<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "view/header.php";
include "model/taikhoan.php";
include "model/cart.php";
include "global.php";

if(!isset($_SESSION['mycart'])) $_SESSION['mycart'] =[];


$dsdm = loadall_danhmuc();
$spnew = loadall_sanpham_home();
$dstop10 = loadall_sanpham_top10();

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id, $iddm);
                include "view/sanphamct.php";
            } else {
                include "view/home.php";
            }
            break;
        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "ĐĂNG KÝ THÀNH CÔNG. VUI LÒNG ĐĂNG NHẬP ĐỂ ĐẶT HÀNG";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            
         
            
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['dangnhap'])) {
                $user = $_POST["user"];
                $pass = $_POST["pass"];
                $errors = [];
            
                
                if (empty($user)) {
                    $errors[] = "Username không được để trống.";
                } elseif (strlen($user) < 3 || strlen($user) > 30) {
                    $errors[] = "Độ dài Username phải nằm trong khoảng 3 đến 30 ký tự.";
                }
            
               
                if (empty($pass)) {
                    $errors[] = "Password không được để trống.";
                } elseif (strlen($pass) < 6 || strlen($pass) > 10) {
                    $errors[] = "Độ dài Password phải nằm trong khoảng 6 đến 10 ký tự.";
                }
                
               
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<p style='color:red;float:right'>$error</p><br>";
                    }
                    include "view/home.php";
                } else {
                   
                   
                    
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    include "view/home.php";
                   // header('Location : index.php');
                  
                } else {
                    
                    echo "<p style='color:red;float:right'>USERNAME HOẶC PASSWORD ĐÃ NHẬP SAI</p><br>";
                    include "view/home.php";
                }
               
            
                }
            }
           
            



            // ==========================================================
            // if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
            //     $user = $_POST['user'];
            //     $pass = $_POST['pass'];
            //     $checkuser = checkuser($user, $pass);
            //     if (is_array($checkuser)) {
            //         $_SESSION['user'] = $checkuser;
            //        // header('Location : index.php');
            //        include "view/home.php";
            //     } else {
            //         $thongbao = "TÀI KHOẢN KHÔNG TỒN TẠI. VUI LÒNG KIỂM TRA HOẶC ĐĂNG KÝ";
            //     }
            //     include "view/taikhoan/dangky.php";
            // }
            
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = checkuser($user, $pass);
                header('Location : index.php?act=edit_taikhoan');
            }
            include "view/taikhoan/edit_taikhoan.php";
            break;
        case 'quenmk':
            if (isset($_POST['guiemail']) && ($_POST['guiemail'])) {

                $email = $_POST['email09'];
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['pass'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'thoat':
            session_unset();
            header('Location: index.php');
            break;
        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $ttien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $ttien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/cart/viewcart.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
                /** tham số 1 là mảng cần xóa ,2 là vị trí xóa */
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
        case 'viewcart':
            include "view/cart/viewcart.php";
            break;
        case 'bill':
            include "view/cart/bill.php";
            break;
        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/Y');
                $tongdonhang = tongdonhang();

                $bill = insert_bill($name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);

                //insert into cart: $session['mycart'] & idbill
               
            }

            $viewbill = select_bill($bill);
            include "view/cart/billconfirm.php";
            break;
        case 'mybill':
            include "view/cart/mybill.php";
            break;
        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
