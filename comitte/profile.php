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
<table bgcolor="#f2f2f2" style="padding:50px" align="center">
<form onSubmit="return validateform()"  action="" method="post">
<tr>
    <?php
    
    $login_committee_ID=$_SESSION['login_committee_ID'];
    include 'db_connect.php';
    $sql = "SELECT * FROM committee where committee_ID='$login_committee_ID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        
        $committee_ID=$row['committee_ID'];
        $committee_rep=$row['committee_rep'];
        $college=$row['college'];
        $password='';
          
          }
        
      else {
        echo "cannot find profile";
      }
    ?>

<td> Your ID : </td><td><input type="text" required  name="committee_ID" value="<?php echo $committee_ID?>"></td>
</tr>
<tr>
<td> Your Name : </td><td><input type="text" required  name="committee_rep" value="<?php echo $committee_rep?>"></td>
</tr>
<tr>
<td> Your College : </td><td><input type="text" required  name="college" value="<?php echo $college?>"></td>
</tr>
<tr>
<td> Change Password : </td><td><input type="password" name="password" value=""></td>
</tr>

<tr>
<td><input type="submit" name="submit" value="Update account"></td></tr>

</form>
</table>

<?php
if(!isset($_SESSION['login_committee_ID']))
echo "<script>window.location = \"index.php\";</script>";
if(isset($_POST["submit"]))
{
$committee_ID=$_POST["committee_ID"];
$committee_rep=$_POST["committee_rep"];
$college=$_POST["college"];
$password=$_POST["password"];
$sql="UPDATE committee SET committee_ID = '$committee_ID', committee_rep = '$committee_rep', college = '$college', password = '$password' WHERE committee_ID = '$login_committee_ID';";


$conn->query($sql); 
echo "<script>window.location = \"ajax.php?action=logout\";</script>";
//echo '<center> Comment Successfully Submitted </center>';

}

 ?>
