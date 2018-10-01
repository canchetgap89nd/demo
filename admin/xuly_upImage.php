<?php 
    $linkImage = "";
    $name = array();
    $tmp_name = array();
    $error = array();
    $ext = array();
    $size = array();
    foreach ($_FILES['image']['name'] as $file) {
        $name[] = $file;                            
    }
    foreach ($_FILES['image']['tmp_name'] as $file){
        $tmp_name[] = $file;
    }
    foreach ($_FILES['image']['error'] as $file){
        $error[] = $file;
    }
    foreach ($_FILES['image']['type'] as $file){
        $ext[] = $file;
    }
    foreach ($_FILES['image']['size'] as $file){
        $size[] = round($file/1024,2);
    } //Phần này lấy giá trị ra từng mảng nhỏ
  
        for ($i=0;$i<count($name);$i++){
        if ($error[$i] > 0)
          {
            //   echo "Lỗi:" . $error[$i];
          }

          //chỉ nhận cái file ảnh "jpeg","jpg","png"
          
        
        else if($ext[$i]=="image/jpeg"|| $ext[$i]=="image/jpg"|| $ext[$i]=="image/png")
          {
                $temp = preg_split('/[\/\\\\]+/', $name[$i]);
                $filename = $temp[count($temp)-1];
                $upload_dir = "../public/img/";
                $upload_file = $upload_dir . $filename;
                // if (file_exists($upload_file))    kiểm tra trùng file. Nhưng ko phù hợp trong project này
                // {
                //     echo 'File đã tồn tại';
                // }
               
                    if ( move_uploaded_file($tmp_name[$i], $upload_file) ) {
                        // echo "<tr>\n<td>"."Tên file upload : ".$name[$i]."</td>"."<br>";
                        // echo '<td>'."Kiểu file : ".$ext[$i]."</td>"."<br>";
                        // echo '<td>'."size file : ".$size[$i]." kB</td>"."<br>";
                        // echo '<td>'."link file sau update : ".$upload_file."</td></tr>";
                        $linkImage .= $upload_file."?";
                        // $date = date("d-m-Y");
                    }
                    else echo 'loi';
            }
            //End khoi cau lenh up file;
            else 
            {
                echo "File không được hổ trợ ".$ext[$i];
            }
        }//End vong lap for cho tat ca cac file;
        $linkImage = trim($linkImage,"?"); // chuỗi chứa link các ảnh up
?>