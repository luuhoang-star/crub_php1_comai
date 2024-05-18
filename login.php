<?php
    session_start();
    include_once 'db.php';         // tạo phiên bắt đầu cho b3
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h3>Đăng nhập</h3>
    <form action="" method="POST">
        Username <input type="text" name="user"><br>   <!-- b1 -->
        Password <input type="text" name="pass"> <br>
        <input type="submit" value="Đăng nhập" name="btn_login">
    </form>
    <?php
        if(isset($_POST['btn_login'])) {
            $user=$_POST['user'];
            $pass=$_POST['pass']; // b2

            $sql ="select * from acc where user='$user' and pass = '$pass'";
            $result=$conn->query($sql); //b3
 
            if($result){
                $_SESSION['user'] = $user;
                header("Location:showpro.php");
            }else {
                echo "Không đăng nhập thành công";
            }
        }
    ?>
</body>
</html>