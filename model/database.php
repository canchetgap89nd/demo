<?php 
class database{
    public $sql ='';
    public $conn;
    public function connect(){
       
        if (!$this->conn){
            // Kết nối
            $this->conn = mysqli_connect('localhost','root','','news') or die ('Lỗi kết nối');
     
            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }
  
    //get List
    public function getList($sql){
        $this->connect();
        $arr_result = array();
        $result = mysqli_query($this->conn,$sql);
        if(!$result){
            die("Câu lệnh truy vấn sai");
        }
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $arr_result[] = $row;
            }
        }
        mysqli_free_result($result);
        return $arr_result;
    }

    //get 1 row
    public function getRow($sql){
        $this->connect();

        $result = mysqli_query($this->conn,$sql);
        if(!$result){
            die("Sai lệnh truy vấn");
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if($row)
            return $row;
        return false;
    }
    // ngắt kết nối
    public function disconnect(){
        if($this->conn)
            mysqli_close($this->conn);
    }
    //insert data
    public function insert($table, $field, $value){
        $this->connect();

        $data_field = implode(",",$field);
        $dataInsert = '';
        foreach($value as $val){
            $dataInsert .= "n'$val',"; 
        }
        $sql = "INSERT INTO  ".$table."(".$data_field.")". " VALUES(".trim($dataInsert,',').")"; 
        
        return mysqli_query($this->conn, $sql);
    }
    //update data
    public function update($table,$data,$where){
        $this->connect();

        $sql = '';
        foreach($data as $key=>$value){
            $sql .= "$key = n'$value',"; 
        }
        $sql = "UPDATE ".$table. " SET ".trim($sql,',')." WHERE ".$where;
        // echo $sql;
        return mysqli_query($this->conn, $sql);
    }
    //remove data
    public function remove($table,$where){
        $this->connect();

        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->conn,$sql);
    }

}

?>