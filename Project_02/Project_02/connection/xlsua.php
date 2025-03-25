<?php
    //Ket noi CSDL
    require_once("connection.php");
    //Lấy dữ liệu từ form nhập vào
    $maHang=$_POST['maHang'];
    $tenHang=$_POST['tenHang'];
    $giaHang=$_POST['giaHang'];
    $donViTinh=$_POST['donViTinh'];    
    $hinhAnh=$_POST['hinhAnh'];
    $moTa=$_POST['moTa'];
    //Kiểm tra sự trùng lặp dữ liệu
    
    //Xây dựng câu lệnh truy vấn sửa dữ liệu
    $sql_update="Update mathang set tenHang='{$tenHang}',
    giaHang=$giaHang,donViTinh='{$donViTinh}', moTa='{$moTa}'";
    if($hinhAnh!='')
        $sql_update.=" , hinhAnh='{$hinhAnh}'";
    $sql_update.=" WHERE maHang=$maHang";
    //Thực thi truy vấn
    //die($sql_update);
    if($ocon->query($sql_update)===TRUE){
        //thực thi thành công
        header("location:Hienthi2.php");
    }
    else
    {
        //lỗi thực thi
        header("location:Hienthi2.php?error=2");
    }
    
    $ocon->close();
?>