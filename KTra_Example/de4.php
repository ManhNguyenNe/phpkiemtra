<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đề 4</title>
    <style>
        h2{
            text-align: center;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse; /*Loại bỏ khoảng cách giữa các ô*/
            width: 80%;
            text-align: center;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        form{
            text-align: center;
        }
        .pages {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .page {
            text-decoration: none;
            color: black;
            margin: 10px 5px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: background-color 0.3s ease;
        }

        .page:hover {
            background-color: #007BFF;
            color: white;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <hr>
    <form name="frmsearch" action="de4.php" method="POST">
        <label for="search">Tìm kiếm:</label>
        <input type="search" name="search" id="search" placeholder="Nhập tên sản phẩm">
        <input type="submit" value="Tìm kiếm">
    </form>
    <br>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Mã hàng</th>
                    <th>Tên hàng</th>
                    <th>Số lượng</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Giá hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once("connection/connection.php");

                    $criteria = " WHERE 1=1 ";
                    if (isset($_POST['search']))
                    {
                        $search = $_POST['search'];
                        $criteria .= "and (Tenhang like '%$search%') ";
                    }

                    $sql_total="SELECT count(Mahang) as ts from sanpham" . $criteria;
                    $result=$ocon->query($sql_total);
                    $ts_banghi = $result->fetch_assoc()['ts'];
                    $bg_moitrang = 5;
                    $so_trang = ceil($ts_banghi/$bg_moitrang);

                    $trang = 1;
                    if(isset($_GET['trang']))
                    {
                        $trang = $_GET['trang'];
                    }
                    $offset = ($trang - 1) * $bg_moitrang;
                    
                    $sql="SELECT * FROM sanpham" . $criteria . " LIMIT $bg_moitrang OFFSET $offset";
                    $result=$ocon->query($sql);    
                    if($result->num_rows>0){       
                        while($row=$result->fetch_assoc())
                        {
                ?>
                <tr>
                    <td><?php echo $row["Mahang"];?></td>
                    <td><?php echo $row["Tenhang"];?></td>
                    <td><?php echo $row["Soluong"];?></td>
                    <td><?php echo "<img src = '".$row["Hinhanh"]."' width = '100px' height = '100px'>";?></td>
                    <td><?php echo $row["Mota"];?></td>
                    <td><?php echo $row["Giahang"];?></td>
                </tr>
                <?php
                        }
                    }
                    $ocon->close();
                ?>
            </tbody>
        </table>
        <div class="pages">
            <?php
                if(isset($so_trang)){
                    for($p = 1; $p <= $so_trang; $p++){
                        echo "<a href = 'de4.php?trang=".$p."' class = 'page'>".$p."</a>";
                    }
                }
            ?>
        </div>
    </div>
</body>