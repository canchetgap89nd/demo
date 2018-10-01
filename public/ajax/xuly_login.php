<?php 
session_start();

    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $conn = mysqli_connect('localhost','root','','axunlifohosting_dbtai') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    $sql = "select * from users where userName = '$user'";
    $re = mysqli_query($conn,$sql);
    if(mysqli_num_rows($re)<=0){
        echo 0; // lỗi tài khoản không tồn tại
        exit();

    }
    $row = mysqli_fetch_assoc($re);
    if($pass!= $row['password']){
        echo 1; // lỗi sai mật khẩu
        exit();
    }
    else{
        $_SESSION['user'] = $_POST['user'];
        echo 2; // đăng nhập thành công
    }

?>