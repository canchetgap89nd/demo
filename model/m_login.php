<?php 
    include('database.php');
    class m_login extends database{
        public function getUser($user){
            $sql = "SELECT * FROM users where userName = '$user'";
            return  $this->getRow($sql);
        }
    }
?>