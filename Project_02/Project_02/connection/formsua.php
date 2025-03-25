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
  <?php
    $maHang=$_GET['maHang'];
    require_once("connection.php");    
    $sql="SELECT * FROM mathang WHERE maHang=$maHang";    
    $result=$ocon->query($sql);
    $row=$result->fetch_assoc();
  ?>
<div class="container">
  <h2>Thêm mặt hàng</h2>
  <form action="xlsua.php" method="POST">
  <div class="form-group">
      <label for="tenHang">Mã Hàng:</label>
      <input type="text" class="form-control" 
      id="tenHang" placeholder="Enter tenHang" 
      value="<?php echo $row['maHang'];?>" name="maHang" readonly>
    </div>
    <div class="form-group">
      <label for="tenHang">Tên Hàng:</label>
      <input type="text" class="form-control" 
      id="tenHang" placeholder="Enter tenHang" 
      value="<?php echo $row['tenHang'];?>" name="tenHang">
    </div>
    <div class="form-group">
      <label for="giaHang">Giá hàng:</label>
      <input type="number" class="form-control" 
      id="giaHang" placeholder="Enter giaHang" 
      value="<?php echo $row['giaHang'];?>" 
      name="giaHang">
    </div>
    <div class="form-group">
      <label for="donViTinh">Đơn vị tính:</label>
      <input type="text" class="form-control" 
      id="donViTinh" placeholder="Enter donViTinh"
      value="<?php echo $row['donViTinh'];?>" 
      name="donViTinh">
    </div>
    <div class="form-group">
      <label for="hinhAnh">Hình ảnh:</label>
      <img src="image/<?php echo $row['hinhAnh'];?>">
      <input type="file" class="form-control" 
      id="hinhAnh" value="<?php echo $row['hinhAnh'];?>" placeholder="choose hinhAnh"

      name="hinhAnh">
    </div>
    <div class="form-group">
      <label for="moTa">Mô tả:</label>
      <input type="text" class="form-control" 
      id="moTa" placeholder="Enter moTa" 
      value="<?php echo $row['moTa'];?>"
      name="moTa">
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
  </form>
</div>
</body>
</html>