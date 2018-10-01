<?php 
session_start();
include("../controller/c_demo.php");

if(isset($_SESSION['user'])){
    $c_demo = new c_demo();
    $data = $c_demo->getUserLogin($_SESSION['user']);
    $user = $data['data'];
    // print_r($user);
    $luongbai = $user['luongbai'];
}

if (isset($_POST['up'])){
    // die($_POST['mota-anh']);
    $time_now = date("Y-m-d H:i:sa");
    
    include("xuly_upImage.php"); // xử lý up file ảnh

    $colUpload = array("tieude","tomtat","noidung","hinh","mota","id_theloai","id_loaitin","id_upby","timeup");
    
    $dataUpload = array($_POST['tieu-de'],$_POST['tom-tat'],$_POST['noi-dung'],$linkImage,$_POST['mota'],$_POST['the-loai'],$_POST['loai-tin'],$user['id'],$time_now);

    $c_demo->insertNews($colUpload,$dataUpload);

    $luongbaiUp=$luongbai+1;
    $where = "id =". $user['id'];
    $c_demo->updateSlTin($luongbaiUp,$where);
}

if(isset($_POST['logOut'])){
    unset($_SESSION['user']);
    header("location: index.php");
}
if(isset($_POST['logIn'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
      <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../public/css/index.css" /> 

    <title>Admin</title>
</head>
<body class = "body-ad">
    <div class = "container-fluid">
        <div class = "row" id = "header">
            <h2>Administrator</h2>
        </div>
        <div class = "row">
            <div class = "col-md-5 wrap">
                <h3>Tài khoản</h3>
                <?php 
                    if(isset($_SESSION['user'])){
                        ?>
                            <p>Admin : <?=$user['name'];?></p>
                            <p>Số bài viết đã tải lên : <?=$luongbai?> </p>                    
                        <?php 
                    }
                ?>
                <form action = "" method = "post">
                    <?php 
                    if(!isset($_SESSION['user']))
                            echo '<button name = "logIn" type = "submit" class="btn btn-light">Đăng nhập</button>';          
                    else
                    echo '<button name = "logOut" type="submit" class="btn btn-light">Đăng xuất</button>';

                    ?>
                    
                </form>
            </div>
            <div class = "col-md-7 wrap">
                <div class="wrap-form">
                    <h3>Upload bài viết</h3>
                    <form method="post" enctype="multipart/form-data" action="">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tiêu đề</label>
                            <input type="text" class="form-control" id="tieu-de" aria-describedby="emailHelp" placeholder="Tiêu đề bài viết" name = "tieu-de" required>
                            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung tóm tắt</label>
                            <textarea type="text" class="form-control" id="exampleInputPassword1" placeholder="Tóm tắt bài viết" name = "tom-tat" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung</label>
                            <textarea type="text" id="txtarea-noidung" class="form-control"  placeholder="Nội dung bài viết" name = "noi-dung" required></textarea>
                        </div>
                        
                        <script src="../public/js/resize_textarea.js" ></script> <!-- js resize textarea  -->
                        <div class="form-group col-md-6 col-xs-12 tl">

                            <label for="exampleFormControlSelect1">Thể loại</label>
                            <select onchange="tlChanged(this)" class="form-control" id="exampleFormControlSelect1" name = "the-loai" required>
                                <option value = "">Thể loại</option>
                                <option value = "3">Chính trị</option>
                                <option value = "2">Showbiz</option>
                                <option value = "5">Bóng đá</option>
                                <option value = "4">Sức khỏe</option>
                                <option value = "1">Công nghệ</option>
                            </select>      
                        </div>
                        <div class="form-group loaitin col-md-6 col-xs-12">

                                <label for="exampleFormControlSelect1">Loại tin</label>
                                <select class="form-control" id="exampleFormControlSelect1" name = "loai-tin">
                                    <option class = "value-loaitin" id = "lt1" value = ""></option>
                                    <option class = "value-loaitin" id = "lt2" value = ""></option>
                                    <option class = "value-loaitin" id = "lt3" value = ""></option>
                                    <option class = "value-loaitin" id = "lt4" value = ""></option>
                                    <option class = "value-loaitin" id = "lt5" value = ""></option>
                                    <option class = "value-loaitin" id = "lt6" value = ""></option>

                                </select>      
                            </div>
                            <script>
                                    function tlChanged(obj)
                                    {
                                        var lt1 = document.getElementById('lt1');
                                        var lt2 = document.getElementById('lt2');
                                        var lt3 = document.getElementById('lt3');
                                        var lt4 = document.getElementById('lt4');
                                        var lt5 = document.getElementById('lt5');
                                        var lt6 = document.getElementById('lt6');

                                        $(".loaitin").css("display","inline-block");
                                        // var message = document.getElementById('show_message');
                                        var value = obj.value;

                                        if (value === '3'){
                                            lt1.style.display = "block";
                                            lt2.style.display = "block";
                                            lt3.style.display = "none";
                                            lt4.style.display = "none";
                                            lt5.style.display = "none";
                                            lt6.style.display = "none";
                                            lt1.value = "15";
                                            lt2.value = "16";
                                            lt1.text = "Trong nước";
                                            lt2.text = "Quốc tế";        
                                        }

                                        if (value === '2'){
                                            lt1.style.display = "block";
                                            lt2.style.display = "block";
                                            lt3.style.display = "block";
                                            lt4.style.display = "none";
                                            lt5.style.display = "none";
                                            lt6.style.display = "none";

                                            lt1.value = "12";
                                            lt2.value = "13";
                                            lt3.value = "14";

                                            lt1.text = "Sao Việt";
                                            lt2.text = "Sao Hàn";
                                            lt3.text = "Sao US-UK";        

                                        }
                                        
                                        if (value === '5'){
                                            lt1.style.display = "block";
                                            lt2.style.display = "block";
                                            lt3.style.display = "block";
                                            lt4.style.display = "block";
                                            lt5.style.display = "block";
                                            lt6.style.display = "block";


                                            lt1.value = "20";
                                            lt2.value = "21";
                                            lt3.value = "22";
                                            lt4.value = "23";
                                            lt5.value = "24";
                                            lt6.value = "25";

                                            lt1.text = "Ngoại hạng Anh";
                                            lt2.text = "La-Liga";
                                            lt3.text = "Bundesliga";        
                                            lt4.text = "Serie A";        
                                            lt5.text = "Ligue 1";        
                                            lt6.text = "V-Ligue";        

                                        }
                                        if (value === '4'){
                                            lt1.style.display = "block";
                                            lt2.style.display = "block";
                                            lt3.style.display = "block";
                                            lt4.style.display = "none";
                                            lt5.style.display = "none";
                                            lt6.style.display = "none";

                                            lt1.value = "17";
                                            lt2.value = "18";
                                            lt3.value = "19";

                                            lt1.text = "Sức khỏe nam giới";
                                            lt2.text = "Sức khỏe phụ nữ";
                                            lt3.text = "Sức khỏe trẻ em";        

                                        }
                                        if (value === '1'){
                                            lt1.style.display = "block";
                                            lt2.style.display = "block";
                                            lt3.style.display = "block";
                                            lt4.style.display = "block";
                                            lt5.style.display = "block";
                                            lt6.style.display = "block";


                                            lt1.value = "6";
                                            lt2.value = "7";
                                            lt3.value = "8";
                                            lt4.value = "9";
                                            lt5.value = "10";
                                            lt6.value = "11";

                                            lt1.text = "Tin tức công nghệ";
                                            lt2.text = "Điện thoại";
                                            lt3.text = "Máy tính - Laptop";        
                                            lt4.text = "Máy tính bảng";        
                                            lt5.text = "Máy ảnh - camera";        
                                            lt6.text = "Đánh giá sản phẩm";        

                                        }
                                        if (value === ''){
                                        $(".loaitin").css("display","none");
                                            
                                        }
                                        
                                    }
                                </script>
                                
                                <div class="form-group box-input-file">
                                    <label for="exampleInputFile">Tải ảnh lên</label>
                                     <div class="input-file-container">  
                                        <input class="input-file" multiple="true" id="my-file" type="file" name = "image[]" >
                                        <label tabindex="0" for="my-file" class="input-file-trigger">Chọn ảnh...</label>
                                    </div>
                                        <p class="file-return"></p>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả ảnh</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Mô tả ảnh" name = "mota" required>
                                </div>
                                <div class="form-group btn-submit">
                                        <button type="submit" class="btn btn-primary" name = "up">Upload</button>
                                </div>  

                                <!-- js input file type -->    
                                <script src="../public/js/inputFile.js" ></script>
                                <!-- end js input file type -->
                    </form>
                </div>
            </div>

        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>