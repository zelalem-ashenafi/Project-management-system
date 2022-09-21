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
    <table bgcolor="#f2f2f2" style="padding:5px" align="center" id="table">

<?php

include 'db_connect.php';
//$ev_id=$_SESSION['login_ev_id'];
$sql = "select * from advisors";

$result=$conn->query($sql);
if($result->num_rows>0)
{
    
    echo "<thead><tr><th> </th><th>adv_id</th><th>adv_name</th><th>Department</th><th>adv_phone</th><th>stud_id</th><td id=\"buttons\">Operations</th></tr></thead>";
    echo"<tbody>";
    while($row=$result->fetch_assoc())
    {
        $adv_id=$row['adv_id'];
        $adv_name=$row['adv_name'];
        $adv_phone=$row['adv_phone'];
        $stud_id=$row['student_id'];
        $password=$row['password'];
        $dept=$row['dept'];
        $is=$row['isactivated'];
        $isnew=$row['isnew']?"new":" ";
        $isnew=$row['isnew']?"new":" ";
        
        
    echo "<tr><td>$isnew</td><td>$adv_id</td><td>$adv_name</td><td>$dept</td><td>$adv_phone</td><td>$stud_id</td>
    <td><button type=submit name=\"edit\" value=\"$adv_id\"><img style=\"width:23px;height:23px;\" src=\"../assets/edit.png\"></img></button>
    <button type=submit name=\"delete\" value=\"$adv_id\"><img style=\"width:23px;height:23px;\" src=\"../assets/delete.png\"></img></button>
    ";
    if($is)
    {
        echo "<button type=submit name=\"activate\" value=\"$adv_id\" ><img style=\"width:23px;height:23px;border:0px\" src=\"../assets/on.png\"></img>";
    }
    else {
        echo "<button type=submit name=\"deactivate\" value=\"$adv_id\" ><img style=\"width:23px;height:23px;padding:0px; margin:0px\" src=\"../assets/off.png\"></img>";
    }
    echo"
    </button>
    </td></tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
else
{
    echo 'no advisors';
}

if(isset($_POST["edit"]))
{
    echo 'editing';
    $id=$_POST["edit"];
    ?>
  <script type="text/javascript">
    window.location = "index.php?page=edit&id=<?php echo $id ?>&role=adv";
    </script>
<?php }

if(isset($_POST["delete"]))
{
$adv_id=$_POST["delete"];
$sql = "delete from advisors where adv_id='$adv_id'";
$result=$conn->query($sql);
 ?>
 <script type="text/javascript">
window.location = "index.php?page=manage_adv";
</script> 
<?php
 //Including dbconfig file.






}
if(isset($_POST["activate"]))
{
$adv_id=$_POST["activate"];
$sql = "update advisors set isactivated=b'0' where adv_id='$adv_id'";
$result=$conn->query($sql);
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_adv\";

</script>" ;
}   
if(isset($_POST["deactivate"]))
{
$adv_id=$_POST["deactivate"];
$sql = "update advisors set isactivated=b'1' where adv_id='$adv_id'";
$result=$conn->query($sql); 
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_adv\";

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