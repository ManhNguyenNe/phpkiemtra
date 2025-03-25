<?php
$host="127.0.0.1";
$user="root";
$pass="";
$dbname="quanlybaiviet";
$ocon=new mysqli($host,$user,$pass,$dbname);
if($ocon->connect_error)
{
    die("Lỗi kết nối:".$ocon->connect_error);
}
?>