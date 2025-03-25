<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đề 3</title>
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
    <h2>Thêm sản phẩm</h2><hr>
    <form action="xlde3.php" method="POST">
        <table>
            <tr>
                <td><label for="tensp">Tên sản phẩm:</label></td>
                <td><input type="text" id="tensp" name="tensp" placeholder="Nhập tên sản phẩm" required></td>
            </tr>
            <tr>
                <td><label for="soluong">Số lượng:</label></td>
                <td><input type="number" id="soluong" name="soluong" placeholder="Nhập số lượng" required></td>
            </tr>
            <tr>
                <td><label for="hinhanh">Hình ảnh:</label></td>
                <td><input type="url" id="hinhanh" name="hinhanh" placeholder="Nhập tên file hình ảnh"></td>
            </tr>
            <tr>
                <td><label for="mota">Mô tả:</label></td>
                <td><input type="text" id="mota" name="mota" placeholder="Nhập mô tả"></td>
            </tr>
            <tr>
                <td><label for="gia">Giá sản phẩm:</label></td>
                <td><input type="number" id="gia" name="gia" placeholder="Nhập giá" required></td>
            </tr>
            <tr>
                <td><label for="loaisp">Loại sản phẩm:</label></td>
                <td>
                    <select id="loaisp" name="maloai" required>
                        <option value="">Chọn loại sản phẩm</option>
                        <?php 
                            require_once('connection/connection.php');
                            $sql = "SELECT Maloai, Tenloai FROM loaisp";
                            $result = $ocon->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['Maloai'] . "'>" . $row['Tenloai'] . "</option>";
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