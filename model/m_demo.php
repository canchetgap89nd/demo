<?php 
    include('database.php');
    class m_demo extends database{
        function getData(){
            $sql = "SELECT * FROM users";
            return $this->getList($sql);
        }
        function getOne($id){
            $sql = "SELECT * FROM users where id= $id";
            return $this->getRow($sql);
        }
        function getOneUser($user){
            $sql = "SELECT * FROM users where userName= '$user'";
            return $this->getRow($sql);
        }
    }
?>