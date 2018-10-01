<?php 
    include("../model/m_demo.php");
    class c_demo{
        public function index(){
            $m_demo = new m_demo();
            $data = $m_demo->getData();
            return array("data"=>$data);
        }
        public function insertNews($field, $value){
            $m_demo = new m_demo();
            return $m_demo->insert("tin", $field, $value);      
        }
        public function insertUser($field, $value){
            $m_demo = new m_demo();
            return $m_demo->insert("users", $field, $value);      
        }
        public function updateSlTin($sl,$where){
            $m_demo = new m_demo();
            return $m_demo->update("users", array("luongbai"=>(int)$sl), $where);      

        }
        public function getUser(){
            $_GET['id'] = isset($_GET['id'])? :21;
            $id = $_GET['id'];

            $m_demo = new m_demo();
            $data = $m_demo->getOne($id);
            return array("data"=>$data);
        }
        public function getUserLogin($user){
            $m_demo = new m_demo();
            $dataUser = $m_demo->getOneUser($user);
            return array("data"=>$dataUser);
        }
    }
?>