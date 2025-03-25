<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header,footer{
            width:100%;
            height:150px;
            background-color:lightblue;
            float:left;
        }
        #content{
            width:100%;
            height:500px;
            background-color:ligthgreen;
            float:left;

        }
    </style>
</head>
<body>
    <header>

        <?php 
        session_start();
        $users=array(
            "user1"=>"123",
            "cntt"=>"12345",
            "admin"=>"123",
            "K24CNTTA"=>"abc",
            "Ketoan"=>"phong123",
        );
        $_SESSION["users"]=$users;//Khởi tạo biến session
        include("layout/header.php");
        ?>
    </header>
    <div id="content">
       <!--Tùy thuộc vào request--> 
        <?php
            $c_page="index.php";
            if(isset($_GET['trang']))
                if($_GET['trang']=='login'){
                    $c_page="login.php";
                }
                else if($_GET['trang']=='register'){
                    $c_page='register.php';
                }
                else if($_GET['trang']=='mathang'){
                    $c_page='mathang.php';
                }
            include("view/".$c_page);
        ?>
    </div >

    <footer>
        <?php include("layout/footer.php");?>
    </footer>
</body>
</html>