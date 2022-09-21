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
    
    $login_id=$_SESSION['login_id'];
    include 'db_connect.php';
    $sql = "SELECT * FROM admin where id='$login_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
        
        
        $admin_name=$row['name'];
        $username=$row['username'];
        $password='';
          
          }
        
      else {
        echo "profile not found";
      }
    ?>

<td> Your Name : </td><td><input type="text" required  name="admin_name" value="<?php echo $admin_name?>"></td>
</tr>
<tr>
<td> Your username : </td><td><input type="text" required  name="admin_username" value="<?php echo $username?>"></td>
</tr>
<tr>
<td> Change Password : </td><td><input type="password" name="password" value=""></td>
</tr>

<tr>
<td><input type="submit" name="submit" value="Update account"></td></tr>

</form>
</table>

<?php
if(!isset($_SESSION['login_id']))
echo "<script>window.location = \"index.php\";</script>";
if(isset($_POST["submit"]))
{
$admin_name=$_POST["admin_name"];
$username=$_POST["admin_username"];

$password=$_POST["password"];
$sql="UPDATE admin SET admin_name = '$admin_name', username='$username' password = '$password' WHERE id = '$login_id';";


$conn->query($sql); 
echo "<script>window.location = \"ajax.php?action=logout\";</script>";
//echo '<center> Comment Successfully Submitted </center>';

}

 ?>
