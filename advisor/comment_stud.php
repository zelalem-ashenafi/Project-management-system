<style>
	.custom-menu {
        z-index: 1000;
	    position: absolute;
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
 border: 1px solid black;
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
 border: 1px solid black;
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
<table border="2"  bgcolor="#f2f2f2" style="padding:50px" align="center">
<form onSubmit="return validateform()"  enctype="multipart/form-data" action="" method="post">
<tr>
    <?php
    if(!isset($_SESSION['login_adv_id']))
    echo "<script>window.location = \"index.php\";</script>";
    $Leader_id="";
    //var_dump($_SESSION);
    $adv_name=$_SESSION['login_adv_name'];
    $adv_id=$_SESSION['login_adv_id'];
    include 'db_connect.php';
    $sql = "select submissions.Leader_ID, students.stud_name from submissions left join students on students.stud_id=submissions.Leader_ID where submissions.advisor='$adv_id';";
    //echo $sql;
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
  
        while($row = $result->fetch_assoc()) {
          $Leader_id=$row['stud_name'];
          }
        
      } else {
        echo "No student";
      }
    ?>

<td> To : </td><td><input type="text" required  name="stud" value="<?php echo $Leader_id?>"></td>
</tr>
<tr>
<td> Attach file : </td><td><input type="file" name="file_name" required></td>
</tr>
<tr>
<td> message(optional) : </td><td><textarea name="comment"rows="6" cols="50"></textarea></td>
</tr>
   
<tr>
<td><input type="submit" name="submit"></td></tr>

</form>
</table>

<?php
if(isset($_POST["submit"]))
{
 
 //Including dbconfig file.

 
$sender=$adv_name;
$receiver=$Leader_id;
$now=date('Y-m-d H:i:00');
$announce = $_POST["comment"];
$file_name=$_FILES['file_name']['name'];
include '../upload.php';
if(uploadFile($_FILES))
{
    $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text,file_name) VALUES ('$sender','$receiver','$now','$announce','$file_name')"); 
    echo "<script type=\"text/javascript\">
            alert(\"Send Succesfully\"); 
            window.location = \"index.php\";
  </script>";
    //echo "INSERT INTO annoncements (sender,receiver,st_date,announce_text,file_name) VALUES ('$sender','$receiver','$now','$announce','$file_name')";
}
else {
    echo "not uploaded";
}



}

 ?>
