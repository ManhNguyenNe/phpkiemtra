<?php
//Khai báo 1 mảng gồm 10 user, 10 pass word
session_start();
$users=$_SESSION["users"];
//var_dump( $users);

$user=$_POST['txtuser'];
$pass=$_POST['txtpass'];
//truy cập mảng để xem có tồn tại user và pass đó không nếu có
//chuyển sang trang mặt hàng
//sai quay về trang register
if(isset($users[$user]))
{
    if ($users[$user]==$pass)//Đặng nhập nhập thành công
        {
            //mở ra phiên đăng nhập
            $_SESSION['flag_login']=true;
            $_SESSION['tentk_login']=$user;
            header("location:../home.php?trang=mathang");
        }
}
else
    header("location:../home.php?trang=register");
/*
if($user=='admin'&& $pass=='123'){
    header("location:../home.php?trang=mathang");
}
else
    header("location:../home.php?trang=register");
*/
?>