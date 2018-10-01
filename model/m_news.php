<?php 
    include('database.php');
    class m_news extends database{
        public function getNew($theloai){
            $sql = "SELECT tieude,tomtat,views,id FROM tin where id_theloai ='$theloai'";
            return $this->getList($sql);
        }
        public function getRandNews($soluong){
            $sql = "SELECT * FROM tin order by rand() limit $soluong";
            return $this->getList($sql);
        }
        public function getListNew($theloai){
            $sql = "SELECT tieude,tomtat,hinh,id FROM tin where id_theloai ='$theloai'";
            return $this->getList($sql);
        }
        public function getListNewChild($loaitin){
            $sql = "SELECT id,tieude,tomtat,hinh FROM tin where id_loaitin ='$loaitin'";
            return $this->getList($sql);
        }
        public function getNewInvol($loaitin){
            $sql = "SELECT tieude,id,hinh FROM tin where id_loaitin ='$loaitin'";
            return $this->getList($sql);
        }
        public function getDetail($id){
            $sql = "SELECT * FROM tin where id ='$id'";
            return $this->getRow($sql);
        }
        public function getMenu(){           
            $sql = "SELECT tl.*, GROUP_CONCAT(Distinct lt.c_id,':',lt.c_name,':',lt.c_unName) AS c_categories FROM categories tl INNER JOIN categories_child lt ON lt.id_theloai = tl.id GROUP BY tl.id";
            return $this->getList($sql);
        }
        public function getlinkList($id){
            $sql="SELECT tl.name,tl.id,lt.c_id,lt.c_name FROM categories tl INNER JOIN categories_child lt ON lt.id_theloai = tl.id where lt.c_id=$id";
            return $this->getRow($sql);
        }
        public function getlinkNew($id){
            $sql="SELECT tl.name,tl.id,lt.c_id,lt.c_name FROM categories tl INNER JOIN categories_child lt ON lt.id_theloai = tl.id INNER JOIN
            tin t ON t.id_loaitin = lt.c_id where t.id=$id";
            return $this->getRow($sql);
        }
        public function getUpBy($idTin){
            $sql="SELECT u.name from users u INNER JOIN tin t ON u.id=t.id_upby where t.id=$idTin";
            return $this->getRow($sql);
        }
    }
?>