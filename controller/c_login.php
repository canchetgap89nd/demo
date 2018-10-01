<?php 
    include("model/m_login.php");
    class login {
        public function log($user, $pass){
            $m_login = new m_login();
            $data = $m_login->getUser($user);
            if($pass!= $data['password'])
                {
                    return 0;
                }
            // return array("user"=>$data);
            return array("user"=>$data);
        }
    }
?>