<?php
$host="127.0.0.1";
$user="root";
$pass="";
$dbname="qlcuahang";
//Tạo đối tượng kết nối
$ocon=new mysqli($host,$user,$pass,$dbname);
//kiểm tra trạng thái kết nối
if($ocon->connect_error)
{
    die("Lỗi kết nối:".$ocon->connect_error);
}


?>