<?php 
include("../controller/c_news.php");
$c_list = new c_news();
$dataList = $c_list->getList2();
$listNew = $dataList['list'];
// $title = $c_list->getTitleChild();

$dataMenu = $c_list->Menu();
$menu = $dataMenu['data'];
// print_r($listNew);
// die($title);

$dataLink=$c_list->linkList();
$link = $dataLink['data'];
// print_r($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<base href="demo_oop_mvc/">

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
    <title>Danh sách tin</title>
    <script src="../public/js/fixed-menu.js"></script>

</head>
<body>
        <div class = "container-fluid">
                <div class = "row">
                    <div id = "header">
                        <a href ="http://localhost/demo_oop_mvc/trang-chu"><img src="../public/img/logo-footer.png"></a>
        
                    </div>
                </div>
            </div>
            <div id = "header2">
                <div class = "container">
                    <div class = "row">
                        <div class = "col-md-8 content-header2">
                            <a href = "http://localhost/demo_oop_mvc/trang-chu"><img src = "../public/img/logo.PNG"></a>
                        </div>
                        <div class = "col-md-4 content2-header2">
                            <i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp;0962389101<br><br>
                            <i class="fas fa-envelope-open"></i>&nbsp;&nbsp;&nbsp;aquyen23@gmail.com
                        </div>
                    </div>
                </div>
            </div>
            <div class = "menu">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class = "container">

                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="http://localhost/demo_oop_mvc/trang-chu">Trang Chủ</a>
                      </div>
              
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                            foreach($menu as $value){
                                ?>
                                <ul class="nav navbar-nav">
                                
                                    <li class="dropdown">
                                        <a href="list.php?theloai=<?=$value['id']?>" class="dropdown-toggle" data-toggle="dropdown"><?=$value['name']?></b></a>
                                        <ul class="dropdown-menu">
                                            <?php 
                                                $c_categories = explode(',', $value['c_categories']);
                                                foreach($c_categories as $cc_value){
                                                    list($c_id, $c_name, $c_unName) = explode(':',$cc_value);
                                                    ?>
                                                    <li><a href="<?php echo "http://localhost/demo_oop_mvc/danh-sach-".$c_id.".html";?>"><?=$c_name?></a></li>
                                                    <?php 
                                                }
                                            ?>                                           

                                        </ul>
                                    </li>

                            </ul>
                                <?php
                            }
                        ?>
                      </div>
                      <!-- /.navbar-collapse -->
                    <!-- /.container-fluid -->
                    </div>
                  </nav>
                  <script>
                    $('ul.nav li.dropdown').hover(function() {
                        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
                        }, function() {
                        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
                    });
                  </script>
    </div>
            <div class="list wrap-list">
                <div class="container">
                    <div class="row">
                        <p class = "title-hot-news"><?=$link['c_name']?></p>
                        <div class="col-md-12 link"><span><a href ="http://localhost/demo_oop_mvc/trang-chu">Trang chủ</a></span>&nbsp;>>&nbsp;<span><a href="list.php?theloai=<?=$link['id']?>"><?=$link['name']?></a></span>&nbsp;>>&nbsp;<span><a href="list2.php?loaitin=<?=$link['c_id']?>"><?=$link['c_name']?></a></span></div>
                        <?php 
                            foreach($listNew as $key=>$value){
                                // echo $key."   ".count($listNew);
                                ?>
                                    <div class="item-new">
                                        <div class="col-md-3">
                                            <a href="<?php echo "http://localhost/demo_oop_mvc/chi-tiet-".$value['id'].".html";?>">
                                                <br>
                                                <img width="" height="" class="img-responsive" src="<?=$value['hinh']?>" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-9">
                                            <a class="title-list2" href="<?php echo "http://localhost/demo_oop_mvc/chi-tiet-".$value['id'].".html";?>"><h3><?=$value['tieude']?></h3></a>
                                                <p><?=$value['tomtat']?></p>
                                                <a class="btn btn-primary" href="<?php echo "http://localhost/demo_oop_mvc/chi-tiet-".$value['id'].".html";?>">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a>
                                        </div>
                                    </div>
                                    <?php
                                    if($key<count($listNew)-1){
                                    ?>
                                        <div class="col-md-12">
                                            <p class="break"></p>
                                        </div>
                        
                                <?php }
                            }
                        
                        ?>
                        
                    </div>
                </div>
            </div>
            <section id="footer">
        <div class = "container">
            <div class="top-footer">
                <div class="col-md-3">
                    <a href ="http://localhost/demo_oop_mvc/trang-chu"><img id="logo-footer" src ="../public/img/logo-footer.png"></a>
                </div>
                <div class="col-md-9">
                    <p class="right-footer">
                        <a href="#">ABOUT</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#">TERMS</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#">CAREERS</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#">CONTACT</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </p>
                </div>

            </div>
            <div class = "col-md-12 line-footer"></div>
            <div class="col-md-12 bottom-footer">
                <div class="col-md-12 coppyright">
                    <p class ="txt-coppyright">  
                    © Copyright 2017 Ph Quyen - All Rights Reserved</p>
                </div>
            </div>

        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>