<?php 
    require_once("connection.php");
    //Xây dựng câu lệnh truy vấn lấy dữ liệu
    $sql="SELECT * FROM mathang";
    //Thực thi truy vấn
    $result=$ocon->query($sql);
    //Đọc dữ liệu từ biến kết quả lấy về
    //kiểm tra xem có kết quả không?
    if($result->num_rows>0){
        //có dữ liệu trả về
        //Duyệt dữ liệu trong $result theo cách chuyển nó về
        //dạng mảng liên kết
        while($row=$result->fetch_assoc()){
            echo $row["maHang"]."-".$row["tenHang"]."-";
            echo $row["giaHang"]."-".$row["donViTinh"];
            echo "<br>";
        }
    }
    $ocon->close();
?>