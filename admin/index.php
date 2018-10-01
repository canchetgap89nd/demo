<?php 
session_start();

    // include("controller/c_login.php");
    include("../controller/c_dangky.php");

//     if(isset($_POST['login'])){
//         $c_login = new login();
//         $data1 = $c_login->log($_POST['user'],$_POST['pass']);
       
//         if($data1==0){
//             $error1 = "Mật khẩu không đúng!";
//         }
//         else{
//             $_SESSION['user'] = $_POST['user'];
//             header("location: info.php");

//             // $data = $data1['user'];
//             // print_r($data);
//         }
// }



    if(isset($_POST['dk'])){
        $dk = new dangky();
        $name = $_POST['name_dk'];
        $bthdate = $_POST['date_dk'];
        $userName = $_POST['user_dk'];
        $password = $_POST['pass_dk'];
        $mk2 = $_POST['pass2_dk'];
        $email = $_POST['email_dk'];

        $cot = array("name","bthdate","userName","password","mk2","email","sodu");
        $val = array($name,$bthdate,$userName,$password,$mk2,$email,"0");
        $dk->user_dangky($cot,$val); 
    }
//     $c_demo = new c_demo();
//     $data1 = $c_demo->getUser();
//     $user = $data1['data'];
//     if($user==""){
//         echo "Người dùng không tồn tại";
//         die();
//     }
//     // print_r($user);
//     $db = new database();
//     $table = "users";
//     INSERT
//     $field = array("name","userName");
//     $val = array("QuyềnAnh","po1");
//     $c_demo->insertUser($table,$field,$val);
// -------------------
//     UPDATE

//     $data = array('name'=>'Quyền');
//     $where = "id = 314";
//     $db->update($table,$data,$where);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=”viewport” content=”width=device-width, initial-scale=1″>

    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
  <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/index.css" /> 

    <title>Đăng nhập</title>
</head>
<body class = "body">
    <div class = "container-fluid">
    

        <div class = "row">
        <?php  
        if(isset($error1))
            echo '<div style = "text-align: center;" class="alert alert-danger" role="alert">Tài khoản hoặc mật khẩu không đúng!</div>';  
        ?>
            <div class= "col-md-5 col-md-offset-7">
                <div class = "wrap-menu">
                    <div class = "item-menu">
                        <a href = "#"><p>Update</p></a>
                    </div>
                    <div class = "item-menu im2">
                        <a href = "#"><p>Giới thiệu</p></a>
                    </div>
                    <div class = "item-menu im3">
                        <a href = "upload.php"><p>Tài khoản</p></a>
                    </div>
                    
                    <?php
                        if(!isset($_SESSION['user'])){
                            ?>
                            <div class = "item-menu im4">
                                <a onclick="document.getElementById('id02').style.display='block'" href = "#"> <p>Đăng ký</p></a>
                            </div>
                            <div class = "item-menu">
                                <a onclick="document.getElementById('id01').style.display='block'" href = "#"> <p>Đăng nhập</p></a>
                            </div>
                            
                            <?php 
                        }
                    ?>
                    <div class = "clear"></div>
                </div>
            </div>
        </div>
        <div class = "row">
            <div class = "" id = "body-content">
                <div class = "content">
                    
                    <p class = "txt-content c1">WE ARE MADE</p>
                    <p class = "txt-content c2"><em>of</em></p>
                    <p class = "txt-content c3">IDEAS</p>
                </div>
            </div>
        </div>
    </div>

<!-- <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button> -->

<div id="id01" class="modal">
  
  <form class="modal-content animate" method = "post"  >
    <div class="imgcontainer-login">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="../public/img/img_avatar2.png" alt="Avatar" class="avatar">
    </div>

    <div class="container-login">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>
      <div style = "color: red; margin-top: 5px;" id = "error-user"></div>

      <input type="button" name = "login" value = "Login">
      <script>
          $("input[name='login']").click(function(){
              var user = $("input[name='user']").val();
              var pass = $("input[name='pass']").val();
              var error = $("#error-user");
              $.ajax({
                  url: "../public/ajax/xuly_login.php",
                  method: "post",
                  dataType: "text",
                  data: {
                      user: user,
                      pass: pass
                  },
                  success: function(re){
                      re = re.trim();
                    //   alert(re);
                      if(re=="0"){
                        error.html("Tài khoản không tồn tại.");
                        return false;
                      }
                      else if(re=="1"){
                        error.html("Mật khẩu không chính xác.");
                        return false;
                      }
                      else if(re=="2")  // đăng nhập thành công
                      {
                        $(location).attr('href', 'upload.php');
                      }

                  }
              });
          });
      </script>
      <!-- <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label> -->
    </div>

    <div class="container-login" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
// var modal = document.getElementById('id01'); 

// When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     modal.style.display = "none";
//     // if (event.target == modal) {
//     // }
// }


// window.addEventListener('click', function(e){   
//   if (document.getElementById('id01').contains(e.target)){
//     // Clicked in box
// } else{
//     document.getElementById('id01').style.display = "none";
//     // Clicked outside the box
//   }
// });
</script>
<!-- form dang ky -->
<div id="id02" class="modal2">
  
  <form class="modal-content animate" method = "post"  >
    <div class="imgcontainer-login">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <!-- <img src="public/img/img_avatar2.png" alt="Avatar" class="avatar"> -->
    </div>

    <div class="container-login">
      <label for="uname"><b>Tài khoản</b></label>
      <input type="text" placeholder="Nhập tên tài khoản" name="user_dk" required>
      <div style = "color: red; margin-top: 5px;" id = "error-user-dk"></div>

        <script>
            $("input[name ='user_dk']").keyup(function(){
                var user_dk = $("input[name ='user_dk']").val();

                var error_dk = $("#error-user-dk");
                $.ajax({
                  url: "../public/ajax/xuly_dk.php",
                  method: "post",
                  dataType: "text",
                  data: {
                        user_dk : user_dk
                  },
                  success: function(result){
                      result = result.trim();
                    //   alert(result);
                      if(result=="0")
                        {
                            $("button[name ='dk']").attr("disabled","disabled");
                            
                            error_dk.html("Tài khoản đã tồn tại");
                        }
                        else{
                            $("button[name ='dk']").removeAttr("disabled");
                            error_dk.html("");
                        }
                  }
                });
            });
        </script>
      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Nhập lại mật khẩu" name="pass_dk" required>

       <label for="psw"><b>Nhập lại mật khẩu</b></label>
      <input type="password" placeholder="Nhập mật khẩu" name="apass_dk" required>

        <label for="psw"><b>Mật khẩu cấp 2</b></label>
      <input type="password" placeholder="Nhập mật khẩu cấp 2" name="pass2_dk" required>

         <label for="psw"><b>Nhập lại mật khẩu cấp 2</b></label>
      <input type="password" placeholder="Nhập lại mật khẩu cấp 2" name="apass2_dk" required>
      
        <label for="uname"><b>Họ và tên</b></label>
      <input type="text" placeholder="Nhập họ tên" name="name_dk" required>

        <label for="uname"><b>Email</b></label>
      <input type="email" placeholder="Nhâp email đăng ký" name="email_dk" required>

         <label for="uname"><b>Ngày sinh</b></label>
      <input type="date"  name="date_dk" required>

      <button type="submit" name = "dk">Đăng ký</button>
      
      <!-- <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label> -->
    </div>

    <div class="container-login" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<script>
// Get the modal2
var modal2 = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event2) {
    if (event2.target == modal2) {
        modal2.style.display = "none";
    }
}
</script>
<!-- end form dang ky -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>