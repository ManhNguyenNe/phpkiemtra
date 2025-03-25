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
  <h2>Thêm mặt hàng</h2>
  <form action="xlThem.php" method="POST">
    <div class="form-group">
      <label for="tenHang">Tên Hàng:</label>
      <input type="text" class="form-control" id="tenHang" placeholder="Enter tenHang" name="tenHang">
    </div>
    <div class="form-group">
      <label for="giaHang">Giá hàng:</label>
      <input type="number" class="form-control" id="giaHang" placeholder="Enter giaHang" name="giaHang">
    </div>
    <div class="form-group">
      <label for="donViTinh">Đơn vị tính:</label>
      <input type="text" class="form-control" id="donViTinh" placeholder="Enter donViTinh" name="donViTinh">
    </div>
    <div class="form-group">
      <label for="hinhAnh">Hình ảnh:</label>
      <input type="file" class="form-control" id="hinhAnh" placeholder="choose hinhAnh" name="hinhAnh">
    </div>
    <div class="form-group">
      <label for="moTa">Mô tả:</label>
      <input type="text" class="form-control" id="moTa" placeholder="Enter moTa" name="moTa">
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
  </form>
</div>
</body>
</html>