Mặt hàng
<?php
    //session_start();
    if(isset($_SESSION['flag_login'])){
        if($_SESSION['flag_login']==true)
        {
            echo 'Xin chào:'.$_SESSION['tentk_login'];
            echo "<a href='view/xllogout.php'>Logout</a>";
        }
    }
?>