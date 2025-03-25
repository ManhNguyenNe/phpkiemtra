<?php
    //Ket noi CSDL
    require_once("connection.php");
    //Lấy dữ liệu từ link
    $maHang=$_GET['maHang'];
    //Kiểm tra ràng buộc khóa ngoại
    
    //Xây dựng câu lệnh truy vấn xóa dữ liệu
    $sql_del="DELETE FROM mathang where maHang=$maHang";
    //Thực thi truy vấn
    if($ocon->query($sql_del)===TRUE){
        //thực thi thành công
        header("location:Hienthi2.php");
    }
    else
    {
        //lỗi thực thi
        header("location:Hienthi2?error=1");
    }
    
    $ocon->close();
?>