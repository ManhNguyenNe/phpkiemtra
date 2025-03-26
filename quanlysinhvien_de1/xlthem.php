<?php
    require_once('connection.php');
    $tensv = $_POST['tensv'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];
    $makhoa = $_POST['makhoa'];

    $ngayhientai = new DateTime();
    $sinhnhat = new DateTime($ngaysinh);
    $tuoi = $ngayhientai->diff($sinhnhat)->y;

    if ($tuoi < 18) {
        echo "Tuổi sinh viên phải lớn hơn 18.";
        exit();
    }

    $sql = "SELECT masv FROM sinhvien ORDER BY masv DESC LIMIT 1";
    $result = $ocon->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $last_masv = $row['masv'];
        $number = (int)substr($last_masv, 2);
        $new_number = $number + 1;
        $new_masv = "SV" . str_pad($new_number, 3, "0", STR_PAD_LEFT);
    } else {
        $new_masv = "SV001";
    }

    $sql_insert = "INSERT INTO sinhvien (maSV, hoTen, ngaySinh, gioiTinh, maKhoa) 
                   VALUES ('$new_masv', '$tensv', '$ngaysinh', '$gioitinh', '$makhoa')";
    if ($ocon->query($sql_insert) === TRUE) {
        echo "Thêm sinh viên thành công";
    } else {
        echo "Gặp lỗi không thêm mới được";
    }

    $ocon->close();
?>