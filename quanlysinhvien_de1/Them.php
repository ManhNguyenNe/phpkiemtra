<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm</title>
    <style>
        h2{
            text-align: center;
        }
        table{
            margin: 0 auto;
        }
        label{
            font-weight: bold;
            font-size: 18px;
            margin-right: 20px;
        }
        input{
            width: 200px;
            height: 18px;
            font-size: 14px;
        }
        td {
            padding: 10px;
        }
        input[type="radio"] {
            width: 25px;
        }
        input[type="submit"] {
            font-size: 14px;
            height: 25px;
            width: 100px;
            padding: 5px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Thêm sinh viên</h2><hr>
    <form action="xlthem.php" method="POST">
        <table>
            <tr>
                <td><label for="tensv">Tên sinh viên:</label></td>
                <td><input type="text" id="tensv" name="tensv" placeholder="Nhập tên sinh viên" required></td>
            </tr>
            <tr>
                <td><label for="ngaysinh">Ngày sinh:</label></td>
                <td><input type="date" id="ngaysinh" name="ngaysinh" required></td>
            </tr>
            <tr>
                <td><label for="gioitinh">Giới tính:</label></td>
                <td>
                    <input type="radio" id="nam" name="gioitinh" value="Nam" required>
                    <label for="nam">Nam</label>
                    <input type="radio" id="nu" name="gioitinh" value="Nữ" required>
                    <label for="nu">Nữ</label>
                </td>
            </tr>
            <tr>
                <td><label for="khoa">Khoa:</label></td>
                <td>
                    <select id="khoa" name="makhoa" required>
                        <option value="">Chọn loại khoa</option>
                        <?php 
                            require_once('connection.php');
                            $sql = "SELECT maKhoa, tenKhoa FROM khoa";
                            $result = $ocon->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['maKhoa'] . "'>" . $row['tenKhoa'] . "</option>";
                                }
                            }
                        ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Thêm"></td>
            </tr>
        </table>
    </form>
    <?php
        $ocon->close();
    ?>
</body>