<?php 
    include("../model/database.php");
    class dangky{
        public function user_dangky($field, $value){
            $db = new database();
            return $db->insert("users",$field, $value);
        }
    }
?>