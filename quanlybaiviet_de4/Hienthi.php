<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bài viết</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Danh sách bài viết</h2>
    <hr>
    <form name="frmsearch" action="Hienthi.php" method="POST">
        <select id="searchtype" name="searchtype">
            <option value="">Kiểu tìm kiếm</option>
            <option value="kieu1">Tên bài viết</option>
            <option value="kieu2">Ngày tạo</option>
            <option value="kieu3">Tác giả</option>
            <option value="kieu4">Tên bài và nội dung</option>
        <input type="search" name="search" id="search">
        <input type="submit" value="Tìm kiếm">
    </form>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ngày đăng</th>
                    <th>ID thành viên</th>
                    <th>Họ và tên</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    require_once("connection.php");

                    $criteria = " WHERE 1=1";
                    if (isset($_POST['search']) && isset($_POST['searchtype']))
                    {
                        $search = $_POST['search'];
                        $searchtype = $_POST['searchtype'];
                        switch ($searchtype) {
                            case 'kieu1':
                                $criteria .= " AND tieuDe LIKE '%$search%'";
                                break;
                            case 'kieu2':
                                $criteria .= " AND ngayDang LIKE '%$search%'";
                                break;
                            case 'kieu3':
                                $criteria .= " AND hoTen LIKE '%$search%'";
                                break;
                            case 'kieu4':
                                $criteria .= " AND (tieuDe LIKE '%$search%' OR noiDung LIKE '%$search%')";
                                break;
                            default:
                                break;
                        }
                    }

                    $sql_total = "SELECT count(*) as ts FROM baiviet inner join thanhvien on baiviet.idThanhVien=thanhvien.id" . $criteria;
                    $result=$ocon->query($sql_total);
                    $sum_pages=$result->fetch_assoc()['ts']; 
                    $pages=ceil($sum_pages/5);

                    $page=1;
                    if(isset($_GET['page']))
                    {
                        $page=$_GET['page'];
                    }
                    $offset=($page-1)*5;

                    $sql="SELECT * FROM baiviet inner join thanhvien on baiviet.idThanhVien=thanhvien.id" .$criteria ." LIMIT 5 OFFSET $offset";
                    $result=$ocon->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            echo "<tr>";
                            echo "<td>".$row["id"]."</td>";
                            echo "<td>".$row["tieuDe"]."</td>";
                            echo "<td>".$row["noiDung"]."</td>";
                            echo "<td>".$row["ngayDang"]."</td>";
                            echo "<td>".$row["idThanhVien"]."</td>";
                            echo "<td>".$row["hoTen"]."</td>";
                            echo "</tr>";
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="pagination"> 
        <?php
            if(isset($pages)){
                for($p = 1; $p <= $pages; $p++){
                    echo "<a href = 'Hienthi.php?page=".$p."' class = 'page'>".$p."</a>";
                }
            }
        ?>
    </div>
</body>