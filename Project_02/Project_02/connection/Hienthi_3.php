<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .row{
            width:100%;
            height:100px;
            float: left;

        }
        .col{
            
            height: 100px;
            float:left;
            border:solid 1px blue;
            margin-left:10px;
        }
    </style>
</head>
<?php
    require_once("connection.php");    
    $sql="SELECT * FROM mathang";  
    $result=$ocon->query($sql);    
    $num_rows=$result->num_rows;
    $so_cot=4;//số sp mỗi dòng
    
?>
<body>
    <?php 
    $i=1;
    while($row=$result->fetch_assoc())
    {
        if ($i%$so_cot==1)
            echo "<div class='row'>";
    ?>
  
    
        <div class="col">
            <?php echo $row["maHang"]."<br>".$row["tenHang"]."<br>";

            ?>
        </div>
        
    
    <?php
        if($i%$so_cot==0)
            echo "</div>";
        $i++;
    }
    $ocon->close();
    ?>
    
</body>
</html>