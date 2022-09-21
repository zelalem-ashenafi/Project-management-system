<style>
	
    .custom-menu {
        z-index: 1000;
	    psition: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
a.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	span.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
a.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	/*border-left:1px solid gray;*/
}
a.custom-menu-list span.icon{
		width:1em;
		margin-right: 5px
}


body{
 margin:0px;
 font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', serif;
 }

input[type=text], select {
 width: 100%;
 border-radius: 5px;
 margin: 7px 0;
 border: 1px solid #ccc;
 padding: 14px 18px; 
 display: inline-block;
 box-sizing: border-box;
}

input[type=submit]:hover {
 background-color: #00a7d1;
}

textarea, select {
 width: 100%;
 border-radius: 5px;
 margin: 7px 0;
 border: 1px solid #ccc;
 padding: 14px 18px; 
 display: inline-block;
 box-sizing: border-box;
}

input[type=submit] {
 width: 100%;
 border: none;
 color: white;
 padding: 14px 20px;
 background-color: #01c9fb;
 margin: 8px 0;
 cursor: pointer;
 border-radius: 4px;
 
}

</style>
</head>
<body>
<br/><br/><br/><br/>
<table border="2" bgcolor="#f2f2f2" style="padding:50px;width:80%" align="center">
<tr>
<form onSubmit="return validateform()"  enctype="multipart/form-data" action="" method="post">
<tr>
   <td> To : </td><td> Evaluators</td>
</tr>

<tr><td> Attach file : </td><td><input type="file" name="file_name" id="file_name"></td></td></tr>
<tr>
<td><input style="margin-top:25%;margin-left:100%" type="submit" name="submit"></td></tr>
</form>
</tr>
</table>

<?php
if(isset($_POST["submit"]))
{
    $sender=$_SESSION['login_stud_name'];
//$receiver=$Leader_id;
    $now=date('Y-m-d H:i:00');
    
    $file_name=$_FILES['file_name']['name'];
    $sql = "select * from stud_eva where stud_id='$stud_id'";
    
    $result = $conn->query($sql);
    include '../upload.php';
if(uploadFile($_FILES))
{
    if ($result->num_rows > 0) {
  
        while($row = $result->fetch_assoc()) {
                      
            $eva=$row['ev_id'];
            echo "$eva";
            $conn->query("INSERT INTO annoncements (sender,receiver,st_date,file_name) VALUES ('$sender','$eva','$now','$file_name')"); 
            $conn->query("update submissions set main_file='$file_name' where Leader_id='$stud_id'");
            
          }
        
      } else {
        echo "No evaluators";
      }
    }
    else {
        echo "not uploaded";
    }
    echo "<script type=\"text/javascript\">
            alert(\"Project Submitted Succesfully\"); 
            window.location = \"index.php\";
  </script>";    

}


 ?>
