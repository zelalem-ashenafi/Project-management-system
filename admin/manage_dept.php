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
table{
   margin-bottom:34px; 
   width:100%
}
table th,td{
    border:4;
    
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



input[type=submit]:hover {
 background-color: #00a7d1;
}



input[type=submit] {
 background-size:auto;
 border: none;
 color: white;
 padding: 14px 20px;
 background-color: #01c9fb;
 margin: 8px 0;
 cursor: pointer;
 border-radius: 4px;
 
}
#buttons{
   
}
</style>

</head>
<body>
<form onSubmit="return validateform()"  method="post" action="">
    <table bgcolor="#f2f2f2" style="padding:50px" align="center">

<?php

include 'db_connect.php';
//$department_ID=$_SESSION['login_department_ID'];

$sql = "select * from department";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    echo '<table bgcolor="#f2f2f2" style="" align="center" id="table">';
    echo" <thead>";
    echo "<tr><th> </th><th>department_ID</th><th>Department Head</th><th>Department</th><th>Operation</th></tr>";
    echo"</thead>";echo"<tbody>";
    while($row=$result->fetch_assoc())
    {
        $department_ID=$row['department_ID'];
        $department_head=$row['department_head'];
      
        $dept=$row['Department'];
        $password=$row['password'];
        $is=$row['isactivated'];
        $isnew=$row['isnew']?"new":" ";
    echo "<tr><td>$isnew</td><td>$department_ID</td><td>$department_head</td><td>$dept</td><td><button type=submit name=\"edit\" value=\"$department_ID\"><img style=\"width:23px;height:23px;\" src=\"../assets/edit.png\"></img></button>
    <button type=submit name=\"delete\" value=\"$department_ID\"><img style=\"width:23px;height:23px;\" src=\"../assets/delete.png\"></img></button>
    ";
    if($is)
    {
        echo "<button type=submit name=\"activate\" value=\"$department_ID\" ><img style=\"width:23px;height:23px;border:0px\" src=\"../assets/on.png\"></img>";
    }
    else {
        echo "<button type=submit name=\"deactivate\" value=\"$department_ID\" ><img style=\"width:23px;height:23px;padding:0px; margin:0px\" src=\"../assets/off.png\"></img>";
    }
    echo"
    </button>
    </td></tr>";
    }
    echo"</tbody>";
    echo "</table>";
   
}
else
{
    echo 'no department';
}
if(isset($_POST["edit"]))
{
    echo 'editing';
    $id=$_POST["edit"];
    ?>
  <script type="text/javascript">
    window.location = "index.php?page=edit&id=<?php echo $id ?>&role=dept";
    </script>
<?php }



if(isset($_POST["delete"]))
{
$department_ID=$_POST["delete"];
$sql = "delete from department where department_ID='$department_ID'";
$result=$conn->query($sql);
 ?>
 <script type="text/javascript">
window.location = "index.php?page=manage_dept";
</script> 
<?php
 //Including dbconfig file.






}
if(isset($_POST["activate"]))
{
$department_ID=$_POST["activate"];
$sql = "update department set isactivated=b'0' where department_ID='$department_ID'";
$result=$conn->query($sql);
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_dept\";

</script>" ;
}
if(isset($_POST["deactivate"]))
{
$department_ID=$_POST["deactivate"];
$sql = "update department set isactivated=b'1' where department_ID='$department_ID'";
$result=$conn->query($sql); 
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_dept\";

</script>" ;
}
?>
</form>
</body>
<script src = "../js/jquery.dataTables.min.js"></script>
<script src = "../js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>