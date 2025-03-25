<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Danh sách Mặt hàng</h2>
  Tìm kiếm:
  <form name="frmsearch" action="Hienthi2.php" method="POST">
      <input type="search" name="search">
      <input type="submit" value="search">
</form>
        
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Giá hàng</th>
        <th>Đơn vị tính</th>
        <th>Hình ảnh</th>
        <th>Mô tả</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
    require_once("connection.php");  
    //0. Tạo điều kiện của select theo mục tìm kiếm
      $criteria=" WHERE 1=1 ";
      if (isset($_POST['search']))
      {
        $se=$_POST['search'];
        $criteria.="and (tenHang like '%$se%' or moTa like '%$se%') ";
      }
    
    //1. Tính tổng số trang và nối điều kiện tìm kiếm
    $sql_total="SELECT count(maHang) as ts 
    from mathang".$criteria;//nối điều kiện tìm kiếm
    //die($sql_total);
    $result=$ocon->query($sql_total);
    $ts_banghi=$result->fetch_assoc()['ts'];
    $bg_moitrang=4;
    $so_trang=ceil($ts_banghi/$bg_moitrang);    
    //3. Sửa truy vấn
    $trang=1;
    if(isset($_GET['trang']))
      $trang=$_GET['trang'];
    $offset=($trang-1)*$bg_moitrang;
    $limit=$bg_moitrang;
    //bổ sung nối điều kiện
    $sql="SELECT * FROM mathang".$criteria." LIMIT $limit OFFSET $offset";  
    $result=$ocon->query($sql);    
    if($result->num_rows>0){       
        while($row=$result->fetch_assoc())
        {            
    ?>    
      <tr>
        <td><?php echo $row["maHang"];?></td>
        <td><?php echo $row["tenHang"];?></td>
        <td><?php echo $row["giaHang"];?></td>
        <td><?php echo $row["donViTinh"];?></td>
        <td><?php echo $row["hinhAnh"];?></td>
        <td><?php echo $row["moTa"];?></td>
        <td><a href="formsua.php?maHang=<?php echo $row['maHang'];?>"> Sửa</a></td>
        <td><a href="xlxoa.php?maHang=<?php echo $row['maHang'];?>">Xóa</a></td>
      </tr>
    <?php
        
        }//while
    }//if
    $ocon->close();
    ?>
     
    </tbody>
  </table>
  <a href="formThem.php">Thêm</a>
  <ul class="pagination">
    <?php 
      $p=1;
      while($p<=$so_trang){
    ?>
   <li class="page-item">
    <a class="page-link"href="Hienthi2.php?trang=<?php echo $p;?>">
      <?php echo $p;?>
    </a>
  </li> 
  <?php 
    $p++;
      }
    ?>  
</ul>
</div>


</body>
</html>