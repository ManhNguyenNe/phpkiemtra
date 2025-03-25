<?php
    //Ket noi CSDL
    require_once("connection.php");
    //Lấy dữ liệu từ form nhập vào
    $tenHang=$_POST['tenHang'];
    $giaHang=$_POST['giaHang'];
    $donViTinh=$_POST['donViTinh'];
    $hinhAnh=$_POST['hinhAnh'];
    $moTa=$_POST['moTa'];
    //Kiểm tra sự trùng lặp dữ liệu
    
    //Xây dựng câu lệnh truy vấn thêm dữ liệu
    $sql_insert="INSERT INTO mathang(tenHang,giaHang,donViTinh,hinhAnh,moTa)
    values ('$tenHang', $giaHang,'$donViTinh','$hinhAnh','$moTa')";
    //Thực thi truy vấn
    if($ocon->query($sql_insert)===TRUE){
        //thực thi thành công
        header("location:Hienthi2.php");
    }
    else
    {
        //lỗi thực thi
        header("location:formthem.php?error=1");
    }
    
    $ocon->close();
?>