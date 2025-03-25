<?php
    require_once('connection/connection.php');
    $tensp = $_POST['tensp'];
    $soluong = $_POST['soluong'];
    $hinhanh = $_POST['hinhanh'];
    $mota = $_POST['mota'];
    $gia = $_POST['gia'];
    $maloai = $_POST['maloai'];

    $sql_check = "SELECT * FROM sanpham WHERE Tenhang = '$tensp'";
    $result_check = $ocon->query($sql_check);
    if ($result_check->num_rows > 0) {
        echo "Sản phẩm đã tồn tại";
        exit();
    }

    // Lấy mã hàng lớn nhất hiện tại
    $sql = "SELECT Mahang FROM sanpham ORDER BY Mahang DESC LIMIT 1";
    $result = $ocon->query($sql);
    $row = $result->fetch_assoc();

    // Tạo mã hàng mới
    if ($row) {
        $last_mahang = $row['Mahang'];
        $number = (int)substr($last_mahang, 2);
        $new_number = $number + 1;
        $new_mahang = "mh" . str_pad($new_number, 3, "0", STR_PAD_LEFT);
    } else {
        $new_mahang = "mh001";
    }

    $sql_insert = "INSERT INTO sanpham (Mahang, Tenhang, Soluong, Hinhanh, Mota, Giahang, Maloai) 
               VALUES ('$new_mahang', '$tensp', $soluong, '$hinhanh', '$mota', $gia, '$maloai')";
    if($ocon->query($sql_insert) === TRUE) {
        echo "Thêm sản phẩm thành công";
    } else {
        echo "Lỗi: " . $sql_insert . "<br>" . $ocon->error;
    }

    $ocon->close();
?>