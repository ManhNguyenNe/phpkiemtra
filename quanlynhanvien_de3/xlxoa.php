<script src='confirm.js'></script>
<?php 
    require_once("connection.php");

    if (isset($_GET['maNV'])) {
        $maNV = $_GET['maNV'];

        $sql = "SELECT * FROM nhanvien WHERE maNV = '$maNV'";
        $result = $ocon->query($sql);

        if ($result->num_rows > 0) {
            $sql_del = "DELETE FROM nhanvien WHERE maNV = '$maNV'";
            if ($ocon->query($sql_del) === TRUE) {
                echo "<script>cuasochuyenhuong('Xóa nhân viên thành công!', 'Hienthi.php');</script>";
                // header("location:Hienthi.php");
            } else {
                echo "Lỗi xóa dữ liệu.";
            }
        } else {
            echo "Nhân viên không tồn tại.";
        }
    } else {
        echo "Mã nhân viên không hợp lệ.";
    }

    $ocon->close();
?>