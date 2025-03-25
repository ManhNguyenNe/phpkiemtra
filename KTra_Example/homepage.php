
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <style>
        .container{
            display: flex;
            height: 100vh;
        }
        h3{
            text-align: center;
        }
        #id1{
            margin: 0px;
        }
        .left{
            width: 20%;
            height: 100%;
            border-right: 1px solid black;
        }
        .right{
            width: 80%;
            height: 100%;
        }
        ul{
            padding: 0;
        }
        li{
            list-style-type: none;
            text-align: center;
        }
        .product-grid{
            display: grid;
            gap: 10px;
            grid-template-columns: repeat(5, 1fr);
            margin-left: 50px;
        }
        .product{
            border: 1px solid black;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
        .danhmuc{
            text-decoration: none;
            color: black;
        }
        .product-info{
            text-align: center;
        }
        .chitiet{
            margin-left: 30px;
        }
        .pages{
            display: flex;
            padding: 10px;
            justify-content: center;
        }
        .page-link{
            text-decoration: none;
            color: black;
            padding: 3px 3px 1px 3px;
            border-bottom: 1px solid black;
        }
    </style>
</head>
<body>
    <?php
        include("layout/header.php");
        require_once("connection/connection.php");
    ?>

    <div class = "container">
        <div class = "left">
            <h3>Danh mục loại sản phẩm</h3>
            <hr>
            <ul>
                <?php
                    $sql1 = "SELECT * FROM loaisp";
                    $result = $ocon->query($sql1);
                    $danhmucdau = null;
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                            if ($danhmucdau === null) {
                                $danhmucdau = $row["Maloai"];
                            }
                            echo "<li><a class = 'danhmuc' href='homepage.php?loai=".$row["Maloai"]."'>".$row["Tenloai"]."</a></li>";
                            echo "<hr>";
                        }
                    }
                ?>
            </ul>
        </div>
        <div class="right">
            <h3>Danh mục sản phẩm</h3>
            <hr>
            <div class = "product-grid">
                <?php
                    if (!isset($_GET['loai']) && $danhmucdau !== null) {
                        $_GET['loai'] = $danhmucdau;
                    }
                    // -> luon kich hoat doạn if phia duoi

                    if(isset($_GET['loai'])){
                        $loaisp = $_GET['loai'];

                        $sql2 = "SELECT count(Mahang) as ts from sanpham WHERE Maloai = '$loaisp'";
                        $result = $ocon->query($sql2);
                        $ts_banghi = $result->fetch_assoc();

                        $bg_moitrang = 10;
                        $sotrang = ceil($ts_banghi['ts'] / $bg_moitrang);

                        $trang = 1;
                        if(isset($_GET['trang'])){
                            $trang = $_GET['trang'];
                        }

                        $offset = ($trang - 1) * $bg_moitrang;
                        $limit = $bg_moitrang;

                        $sql3 = "SELECT * FROM sanpham WHERE Maloai = '$loaisp' LIMIT $limit OFFSET $offset";
                        $result = $ocon->query($sql3);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                                echo "<div class = 'product'>"
                                    ."<img src = '".$row["Hinhanh"]."' width = '100px' height = '100px'> <br>"
                                    ."<div class = 'product-info'>"
                                    .$row["Tenhang"]."<br>"
                                    .$row["Giahang"]."<a href = '' class = 'chitiet'>Chi tiết</a>"."<br>"
                                    ."</div></div>";
                            }
                        }
                    }
                ?>
            </div>
            <div class = 'pages'>
                <?php
                    if (isset($sotrang)) {
                        for ($p = 1; $p <= $sotrang; $p++) {
                            echo "<a href='homepage.php?loai=".$loaisp."&trang=".$p."' class='page-link'>$p</a>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <?php
        $ocon->close();
    ?>
</body>


