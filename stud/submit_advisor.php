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

<table border="2" bgcolor="#f2f2f2" style="padding:50px" align="center">
<tr>
<form onSubmit="return validateform()"  enctype="multipart/form-data" action="" method="post">
<tr>
    <?php
    $adv_name="";
    $stud_id=$_SESSION['login_stud_id'];
    include 'db_connect.php';
    $sql = "select submissions.Leader_ID, advisors.adv_name from submissions left join advisors on advisors.student_id=submissions.Leader_ID where submissions.Leader_ID='$stud_id';";
   
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
  
        while($row = $result->fetch_assoc()) {
          $adv_name=$row['adv_name'];
          }
        
      } else {
        echo "No data found";
      }
    ?>

<td> To : </td><td><input type="text" required  name="advisor_name" value="<?php echo $adv_name?>"></td>
</tr>
<tr>
<td> Attach file : </td><td><input type="file" name="file_name" id="file_name"></td>
</tr>
<tr>
<td> message(optional) : </td><td><textarea name="comment"rows="6" cols="50"></textarea></td>
</tr>
   
<tr>
<td><input type="submit" name="submit"></td></tr>

</form>
    </tr>
</table>

<?php
if(!isset($_SESSION['login_stud_id']))
echo "<script>window.location = \"index.php\";</script>";
if(isset($_POST["submit"]))
{
 
 //Including dbconfig file.

 
$sender=$_SESSION["login_stud_name"];
$receiver=$_POST["advisor_name"];
$now=date('Y-m-d H:i:00');
$announce = $_POST["comment"];
$file_name=$_FILES['file_name']['name'];

include '../upload.php';
if(uploadFile($_FILES))
{
    $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text,file_name) VALUES ('$sender','$receiver','$now','$announce','$file_name')"); 
    echo "<script type=\"text/javascript\">
              alert(\"Message sent successfully\"); 
              window.location = \"index.php\";
    </script>";
 
}
else {
    echo "not uploaded";
}


//echo '<center> Comment Successfully Submitted </center>';

}

 ?>
