<?php 
include("../controller/c_news.php");
$c_news = new c_news();
$DataranNew = $c_news->getRandomNews(12); // lấy 4 bản ghi random
$randNews = $DataranNew['RandNews'];
// print_r($randNews);

// die();

$dataMenu = $c_news->Menu();
$menu = $dataMenu['data'];
// print_r($menu);


$dataTT = $c_news->getOneNew(5);
$thethao = $dataTT['new'];
$max_view_tt = $thethao[0]['views'];
$thethao = $c_news->getHotNewByView($thethao,$max_view_tt); // lấy bài viết có view cao nhất
// die($thethao);
// print_r($dataTT);
// die();
$dataCT =$c_news->getOneNew(3);
$chinhtri = $dataCT['new'];
$max_view_ct = $chinhtri[0]['views'];
$chinhtri = $c_news->getHotNewByView($chinhtri,$max_view_ct); // lấy bài viết có view cao nhất

$dataSK =$c_news->getOneNew(4);
$suckhoe = $dataSK['new'];
$max_view_sk = $suckhoe[0]['views'];
$suckhoe = $c_news->getHotNewByView($suckhoe,$max_view_sk); // lấy bài viết có view cao nhất

$dataCN =$c_news->getOneNew(1);
$congnghe = $dataCN['new'];
$max_view_cn = $congnghe[0]['views'];
$congnghe = $c_news->getHotNewByView($congnghe,$max_view_cn); // lấy bài viết có view cao nhất

$dataSB =$c_news->getOneNew(2);
$showbiz = $dataSB['new'];
$max_view_sb = $showbiz[0]['views'];
$showbiz = $c_news->getHotNewByView($showbiz,$max_view_sb); // lấy bài viết có view cao nhất

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
    <title>Tin tức</title>
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
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="2000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item">
                <img src="../public/img/image-carousel1.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
              <div class="item">
                    <img src="../public/img/image-carousel3.jpg" alt="...">
                    <div class="carousel-caption">
                      ...
                    </div>
                  </div>
              <div class="item active">
                <img src="../public/img/image-carousel2.jpg" alt="...">
                <div class="carousel-caption">
                  ...
                </div>
              </div>
            </div>
          
           
    </div>
    <div class = "container">
        <div class = "row hot-news">
            <p class = "title-hot-news">Tin nổi bật</p>
            <div class ="content-hot-news">
                <div class = "row hot-news-row1">
                    <div class = "col-md-4">
                        <div class="icon col-md-2">
                            <i class="fas fa-music fontawesome"></i>
                        </div>
                        <!-- php -->
                        <div class = "text-hot-news col-md-10">
                            <div class = "title-hot-new">
                                <a href = "chitiet.php?id=<?=$showbiz['id'];?>"><p class = "tieu-de"><?=$showbiz['tieude']?></p></a>
                            </div>
                            <div class = "summary-hot-news">
                                <p class = "tom-tat"><?=$showbiz['tomtat']?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class = "col-md-4">
                        <div class="icon col-md-2">
                            <i class="fas fa-globe fontawesome"></i>
                                
                        </div>
                        <div class = "text-hot-news col-md-10">
                            <div class = "title-hot-new">
                            <a href = "chitiet.php?id=<?=$chinhtri['id'];?>"><p class = "tieu-de"><?=$chinhtri['tieude']?></p></a>
                            </div>
                            <div class = "summary-hot-news">
                                <p class = "tom-tat"><?=$chinhtri['tomtat']?></p>
                                
                            </div>
                        </div>
                    </div>
                    <div class = "col-md-4">
                        <div class="icon col-md-2">
                            <i class="fas fa-futbol fontawesome"></i>
                                        
                        </div>
                        <div class = "text-hot-news col-md-10">
                            <div class = "title-hot-new">
                                <a href = "chitiet.php?id=<?=$thethao['id'];?>"><p class = "tieu-de"><?=$thethao['tieude']?></p></a>
                            </div>
                            <div class = "summary-hot-news">
                            <p class = "tom-tat"><?=$thethao['tomtat']?></p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row divide30"></div>
                <div class = "row hot-news-row2">
                        <div class = "col-md-4">
                                <div class="icon col-md-2">
                                        <i class="fas fa-medkit fontawesome"></i>
                                                                
                                </div>
                                <div class = "text-hot-news col-md-10">
                                    <div class = "title-hot-new">
                                        <a href = "chitiet.php?id=<?=$suckhoe['id'];?>"><p class = "tieu-de"><?=$suckhoe['tieude']?></p></a>
                                    </div>
                                    <div class = "summary-hot-news">
                                    <p class = "tom-tat"><?=$suckhoe['tomtat']?></p>
                                        
                                    </div>
                                </div>
                            </div>
                    <div class = "col-md-4">
                        <div class="icon col-md-2">
                                <i class="fas fa-laptop fontawesome"></i>
                                                        
                        </div>
                        <div class = "text-hot-news col-md-10">
                            <div class = "title-hot-new">
                                <a href = "chitiet.php?id=<?=$congnghe['id'];?>"><p class = "tieu-de"><?=$congnghe['tieude']?></p></a>
                            </div>
                            <div class = "summary-hot-news">
                            <p class = "tom-tat"><?=$congnghe['tomtat']?></p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- <div class = "col-md-4"></div> -->
                </div>
            </div>
        </div>
    </div>
    <div class="current-news">
        <div class = "container">
            <div class = "row hot-news">
                <p class = "title-hot-news">Tin nhanh</p>  
                <div class ="content-current-news">
                    <div class="carousel slide" id="myCarousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                    <ul class="thumbnails">
                                        
                                <?php 
                                    for($i=0;$i<4;$i++){
                                        ?>
                                            <li class="col-sm-3">
                                            <div class="fff">
                                                <div class="thumbnail">
                                                    <a href="chitiet.php?id=<?=$randNews[$i]['id'];?>"><img src="<?=$randNews[$i]['hinh']; ?>" alt=""></a>
                                                </div>
                                                <div class="caption">
                                                    <h4><?=$randNews[$i]['tieude']; ?></h4>
                                                    <p><?=$randNews[$i]['tomtat']; ?></p>
                                                    <a class="btn btn-mini" href="chitiet.php?id=<?=$randNews[$i]['id'];?>">» Xem thêm</a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php 
                                    }
                                ?>
                                       
                                    </ul> 
                              </div><!-- /Slide1 --> 
                            <div class="item">
                                    <ul class="thumbnails">
                                    <?php 
                                    for($i=4;$i<8;$i++){
                                        ?>
                                            <li class="col-sm-3">
                                            <div class="fff">
                                                <div class="thumbnail">
                                                    <a href="chitiet.php?id=<?=$randNews[$i]['id'];?>"><img src="<?=$randNews[$i]['hinh']; ?>" alt=""></a>
                                                </div>
                                                <div class="caption">
                                                    <h4><?=$randNews[$i]['tieude']; ?></h4>
                                                    <p><?=$randNews[$i]['tomtat']; ?></p>
                                                    <a class="btn btn-mini" href="chitiet.php?id=<?=$randNews[$i]['id'];?>">» Xem thêm</a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php 
                                    }
                                ?>
                                        
                                    </ul>
                              </div><!-- /Slide2 --> 
                            <div class="item">
                                    <ul class="thumbnails">
                                    <?php 
                                    for($i=8;$i<12;$i++){
                                        ?>
                                            <li class="col-sm-3">
                                            <div class="fff">
                                                <div class="thumbnail">
                                                    <a href="chitiet.php?id=<?=$randNews[$i]['id'];?>"><img src="<?=$randNews[$i]['hinh']; ?>" alt=""></a>
                                                </div>
                                                <div class="caption">
                                                    <h4><?=$randNews[$i]['tieude']; ?></h4>
                                                    <p><?=$randNews[$i]['tomtat']; ?></p>
                                                    <a class="btn btn-mini" href="chitiet.php?id=<?=$randNews[$i]['id'];?>">» Xem thêm</a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php 
                                    }
                                ?>
                                    </ul>
                              </div><!-- /Slide3 --> 
                        </div>
                        
                       
                       <nav>
                            <ul class="control-box pager">
                                <li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
                                <li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
                            </ul>
                        </nav>
                       <!-- /.control-box -->   
                                              
                    </div><!-- /#myCarousel -->
                    
                </div>
            </div>
        </div>
    </div>
    <div class ="video">
        <div class="container inner-video">
            <div class = "row">
                <p class = "title-video">Video nổi bật</p>  
                <div class = "wrap-videos">
                    <div class = "col-md-6 content-video">
                        <iframe width="100%" height="345" src="https://www.youtube.com/embed/wBX3_knqX6A">

                        </iframe>
                    </div>
                    <div class = "col-md-6 content-video">
                        <iframe width="100%" height="345" src="https://www.youtube.com/embed/OA-aixs7Wxs">

                        </iframe>
                            
                    </div>
                </div>
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
<!-- NOTE :
- Tạo bảng thể loại và loại tin liên kết vs bảng tin qua id ......DONE
- ô input nội dung trong update để thẻ textarea......DONE
- Làm trang để sửa tin
- trong chitiet thêm đường dẫn vào bài .....DONE
- thêm trường để up ảnh thumbnail (không dùng chung vs ảnh trong bài viết)
- thêm trường lưu tên tiêu đề dạng a-b-c (để làm link thân thiện)
- sửa lại tên các trường theo t.anh cho chuẩn
- trường hinh lưu dưới dạng json: link ảnh, mô tả ảnh
- trường upby lưu id ng up để lket vs bảng users .....DONE
- list menu tổng
- thanh menu bôi đen menu đang focus
-->