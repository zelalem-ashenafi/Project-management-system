<style>
  .list{
    width:100%;
    background-color: #CCCCCC;
    padding:20px;
    overflow:auto;
  }
  .list-btn{
    float:right;
  }
	.custom-menu {
        z-index: 1000;
	    position: absolute;
	    background-color: #ffffff;
	    border: 1px solid #0000001c;
	    border-radius: 5px;
	    padding: 8px;
	    min-width: 13vw;
}
.custom-menu-list {
    width: 100%;
    display: flex;
    color: #4c4b4b;
    font-weight: 600;
    font-size: 1em;
    padding: 1px 11px;
}
	.card-icon {
    position: absolute;
    font-size: 3em;
    bottom: .2em;
    color: #ffffff80;
}
.file-item{
	cursor: pointer;
}
.custom-menu-list:hover,.file-item:hover,.file-item.active {
    background: #80808024;
}
table th,td{
	/*border-left:1px solid gray;*/
}
.custom-menu-list span.icon{
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
<?php

include 'db_connect.php';


?>

<table border="2"  bgcolor="#f2f2f2" style="padding:50px" align="center">
<tr>
<form onSubmit="return validateform()"  enctype="multipart/form-data" action="" method="post">
<tr>
<td> Group Name : </td><td><input type="text" required  name="group_name"></td>
</tr>
<tr>
<th> Members List </th><th> Student ID </th><th> Student Name </th>
</tr>

<tr>
<td> 1. : </td><td><input class ="allname" type="text"   name="member1id"></td><td><input type="text"   name="member1"></td>
</tr>
<tr>
<td> 2. : </td></td><td><input  class ="allname" type="text"   name="member2id"><td><input type="text"   name="member2"></td>
</tr>
<tr>
<td> 3. : </td></td><td><input  class ="allname" type="text"  name="member3id"><td><input type="text"   name="member3"></td>
</tr>
<tr>
<td> 4. : </td></td><td><input  class ="allname" type="text"   name="member4id"><td><input type="text"   name="member4"></td>
</tr>
<tr>
<td> 5. : </td></td><td><input  class ="allname" type="text"   name="member5id"><td><input type="text"   name="member5"></td>
</tr>

<tr>
<td> Attach Document : </td><td><input type="file" name="file_name" required></td>
</tr>
<td><input type="submit" name="submit"></td></tr>

</form>
</tr>
</table>
</body>
<?php
if(!isset($_SESSION['login_stud_id']))
echo "<script>window.location = \"index.php\";</script>";
if(isset($_POST["submit"]))
{
 
 //Including dbconfig file.

$lea_id=$_SESSION['login_stud_id']; 
$group_name = $_POST["group_name"];
$dept=$_SESSION['login_dept'];
$group_members= $_POST["member1"].",".$_POST["member2"].",".$_POST["member3"].",".$_POST["member4"].",".$_POST["member5"].",";
$file_name = $_FILES["file_name"]["name"];
$now=date('Y-m-d H:i:00');	
include '../upload.php';
if(uploadFile($_FILES))
{
    $conn->query("INSERT INTO submissions (group_name,Leader_ID,title_file,tsubmission_date,dept) VALUES ('$group_name','$lea_id','$file_name','$now','$dept')");
  foreach(range(1,5) as $i)
  if(!$_POST['member'.$i.'id']==""||!isset($_POST['member'.$i.'id']))
  $conn->query("INSERT INTO groupmembers (stud_id,stud_name,leader_id) VALUES ('".$_POST['member'.$i.'id']."','".$_POST['member'.$i]."','".$lea_id."')");
  
}
else {
    echo "not uploaded";
}

  echo "<script type=\"text/javascript\">
              alert(\"Send Succesfully\"); 
              window.location = \"index.php\";
    </script>";
//echo '<center> Comment Successfully Submitted </center>';

}