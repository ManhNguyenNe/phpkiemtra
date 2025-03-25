<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đề 2</title>
    <style>
        hr{
            margin: 0px;
        }
        .container{
            display: flex;
            height: 100vh;
        }
        .left{
            width: 20%;
            border-right: 1px solid black;
        }
        .right{
            width: 80%;
        }
        h3{
            text-align: center;
        }
        ul{
            padding: 0;
            margin: 0px;
        }
        li{
            list-style-type: none;
            text-align: center; 
            padding: 10px;
        }
        table{
            width: 100%;
            margin: 10px;
            text-align: center;
            border: 1px solid black;
        }
        td{
            border-right: 1px solid black;
            border-top: 1px solid black;
            padding: 0px;
            justify-content: center;
        }
        th{
            border-right: 1px solid black;
            padding: 0px;
        }
        .pages{
            display: flex;
            justify-content: center;
        }
        .page{
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php
        include('layout/header.php');
        require_once('connection/connection.php');
    ?>
    <div class = 'container'>
        <div class = 'left'>
            <h3>Danh mục loại sản phẩm</h3>
            <hr>
            <ul>
                <?php
                    $sql1 = "SELECT * FROM loaisp";
                    $result = $ocon->query($sql1);
                    $danhmucdau = null;
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            if($danhmucdau == null){
                                $danhmucdau = $row['Maloai'];
                            }
                            echo "<li><a href = 'de2.php?Maloai=".$row['Maloai']."'>".$row['Tenloai']."</a></li>";
                            echo "<hr>";
                        }
                    }
                ?>
            </ul>
            
        </div>
        <div class = 'right'>
            <h3>Danh mục sản phẩm</h3>
            <br>
            <table>
                <tr>
                    <th>STT</th>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th>Hình ảnh</th>
                    <th>Chi tiết</th>
                </tr>
                <?php
                    if(!isset($_GET['Maloai']) && $danhmucdau !== null){
                        $_GET['Maloai'] = $danhmucdau;
                    }

                    if(isset($_GET['Maloai'])){
                        $Maloai = $_GET['Maloai'];
                        $sql2 = "SELECT COUNT(*) as ts FROM sanpham WHERE Maloai = '$Maloai'";
                        $result = $ocon->query($sql2);
                        $tsbanghi = $result->fetch_assoc()['ts'];
                        $banghimoitrang = 5;
                        $sotrang = ceil($tsbanghi/$banghimoitrang);

                        $trang = 1;
                        if(isset($_GET['trang'])){
                            $trang = $_GET['trang'];
                        }

                        $offset = ($trang - 1) * $banghimoitrang;
                        $limit = $banghimoitrang;

                        $sql3 = "SELECT * FROM sanpham WHERE Maloai = '$Maloai' LIMIT $limit OFFSET $offset";
                        $result = $ocon->query($sql3);
                        if($result->num_rows > 0){
                            $dem = ($trang - 1) * $banghimoitrang + 1;
                            while($row = $result->fetch_assoc()){
                                echo "<tr>
                                        <td>".$dem."</td>
                                        <td>".$row['Mahang']."</td>
                                        <td>".$row['Tenhang']."</td>
                                        <td><img src = '".$row['Hinhanh']."' width = '100px' height = '100px'></td>
                                        <td>".$row['Mota']."</td>
                                    </tr>";
                                $dem++;
                            }
                        }
                    }
                ?>
            </table>
            <div class = 'pages'>
                    <?php
                        if(isset($sotrang)){
                            for($p = 1; $p <= $sotrang; $p++){
                                echo "<a href = 'de2.php?Maloai=".$Maloai."&trang=".$p."' class = 'page'>".$p."</a>";
                            }
                        }
                    ?>
            </div>
        </div>
    </div>
</body>