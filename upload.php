<?php
function uploadFile($file_array)
{
    $i="-copy";
    $path="../files/";
    $file_name=$file_array["file_name"]["name"];
    $full_path=$path.$file_name;
    $file_type=strtolower(pathinfo($file_name,PATHINFO_EXTENSION));
    if (file_exists($full_path)|| $file_name=="") {
      
      return 1;
      }
      if ($file_array["file_name"]["size"] > 15000000) {
        echo "too much";
        return 0;
      }
    else 
    {
        if(move_uploaded_file($file_array["file_name"]["tmp_name"], $full_path)){
    
        return 1;
    }
        else {
        echo "smt wrong";
        return 0;
    
    }
    
    }


}
?>