<?php 
    include("../model/m_news.php");
    class c_news{
        public function getOneNew($theloai){
            $m_news = new m_news();
            $dataNew = $m_news->getNew($theloai);
            return array("new"=>$dataNew);
        }
      
        public function getHotNewByView($arr,$max){
            foreach($arr as $value){
                if($value['views']>=$max)
                {
                    $max= $value['views'];
                    // echo $value['views']." ";
                    $result= array("tieude"=>$value['tieude'],"tomtat"=>$value['tomtat'],"id"=>$value['id']);
                }       
            }
            return $result;
        }
        public function getRandomNews($sl){
            $m_news = new m_news();
            $dataNew = $m_news->getRandNews($sl);
            return array("RandNews"=>$dataNew);
        }
        public function getList(){
            $theloai = $_GET['theloai'];
            $m_news = new m_news();
            $dataList = $m_news->getListNew($theloai);
            return array("list"=>$dataList);
        }
        public function getList2(){
            $loaitin = $_GET['loaitin'];
            $m_news = new m_news();
            $dataList = $m_news->getListNewChild($loaitin);
            return array("list"=>$dataList);
        }
        public function getInvolve($lt){
            $m_news = new m_news();
            $dataList = $m_news->getNewInvol($lt);
            return array("list"=>$dataList);
        }
      
        public function detail(){
            $id=$_GET['id'];
            $m_news = new m_news();
            $dataDetail = $m_news->getDetail($id);
            return array("data"=>$dataDetail);
        }
        public function Menu(){
            $m_news = new m_news();

            $menu = $m_news->getMenu();
            return array("data"=>$menu);
        }
        public function linkList(){
            $m_news = new m_news();
            $c_id=$_GET['loaitin'];
            $link = $m_news->getlinkList($c_id);
            return array("data"=>$link);
        }
        public function linkNew(){
            $m_news = new m_news();
            $id=$_GET['id'];
            $link = $m_news->getlinkNew($id);
            return array("data"=>$link);
        }
        public function upBy(){
            $m_news = new m_news();
            $id=$_GET['id'];
            $upBy = $m_news->getUpBy($id);
            return array("data"=>$upBy);
        }
    }
?>