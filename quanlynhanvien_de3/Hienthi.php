<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhân viên</title>
    <link rel="stylesheet" href="style.css">
    <script src='confirm.js'></script>
</head>
<body>
    <h2>Danh sách nhân viên</h2>
    <hr>
    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Mã nhân viên</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Chức vụ</th>
                    <th>Phòng ban</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require_once("connection.php");

                    $sql_total="SELECT count(*) as ts FROM nhanvien";
                    $result=$ocon->query($sql_total);
                    $tong_so_hang=$result->fetch_assoc()['ts'];
                    $so_hang_tren_trang=5;
                    $so_trang=ceil($tong_so_hang/$so_hang_tren_trang);
                    $trang_hien_tai=1;
                    if(isset($_GET['trang'])){
                        $trang_hien_tai=$_GET['trang'];
                    }
                    $so_hang_bo_qua=($trang_hien_tai-1)*$so_hang_tren_trang;

                    $sql = "SELECT * FROM nhanvien INNER JOIN phongban on nhanvien.maPB = phongban.maPB LIMIT $so_hang_tren_trang 
                    OFFSET $so_hang_bo_qua";
                    $result = $ocon->query($sql);
                    if($result->num_rows>0)
                        {
                            while($row = $result->fetch_assoc()){
                                echo "<tr>";
                                echo "<td>" . $row['maNV'] . "</td>";
                                echo "<td>" . $row['hoTen'] . "</td>";
                                echo "<td>" . $row['ngaySinh'] . "</td>";
                                echo "<td>" . $row['gioiTinh'] . "</td>";
                                echo "<td>" . $row['chucVu'] . "</td>";
                                echo "<td>" . $row['tenPB'] . "</td>";
                            /*    echo "<td><a href='xlxoa.php?maNV=" . $row['maNV'] . "'>Xóa</a></td>";    */
                                echo "<td><a href='xlxoa.php?maNV=" . $row['maNV'] . "' onclick='return cuasoxoa()'>Xóa</a></td>";
                                echo "</tr>";
                            }
                        }
                ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
        <?php
            for($i=1;$i<=$so_trang;$i++){
                echo "<a href = 'Hienthi.php?trang=".$i."' class = 'page'>".$i."</a>";
            }
            $ocon->close();
        ?>
    </div>
</body>