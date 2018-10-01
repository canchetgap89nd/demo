<?php 
    $user_dk = $_POST['user_dk'];
    $conn = mysqli_connect('localhost','root','','axunlifohosting_dbtai') or die ('Lỗi kết nối');
    mysqli_set_charset($conn, "utf8");
    $sql = "select * from users where userName = '$user_dk'";
    $re = mysqli_query($conn,$sql);
    if(mysqli_num_rows($re)>0){
        echo 0; // lỗi tài khoản tồn tại
        exit();

    }

?>