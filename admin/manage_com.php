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
//$committee_ID=$_SESSION['login_committee_ID'];

$sql = "select * from committee";
$result=$conn->query($sql);
if($result->num_rows>0)
{
    echo '<table bgcolor="#f2f2f2" style="" align="center" id="table">';
    echo" <thead>";
    echo "<tr><th> </th><th>committee_ID</th><th>committee_rep</th><th>committee_list</th><th>College</th><td id=\"buttons\">Operations</th></tr>";
    echo"</thead>";echo"<tbody>";
    while($row=$result->fetch_assoc())
    {
        $committee_ID=$row['committee_ID'];
        $committee_rep=$row['committee_rep'];
        $committee_list=$row['committee_list'];
        $college=$row['college'];
        $password=$row['password'];
        $is=$row['isactivated'];
        $isnew=$row['isnew']?"new":" ";
    echo "<tr><td>$isnew</td><td>$committee_ID</td><td>$committee_rep</td><td>$committee_list</td><td>$college</td><td><button type=submit name=\"edit\" value=\"$committee_ID\"><img style=\"width:23px;height:23px;\" src=\"../assets/edit.png\"></img></button>
    <button type=submit name=\"delete\" value=\"$committee_ID\"><img style=\"width:23px;height:23px;\" src=\"../assets/delete.png\"></img></button>
    ";
    if($is)
    {
        echo "<button type=submit name=\"activate\" value=\"$committee_ID\" ><img style=\"width:23px;height:23px;border:0px\" src=\"../assets/on.png\"></img>";
    }
    else {
        echo "<button type=submit name=\"deactivate\" value=\"$committee_ID\" ><img style=\"width:23px;height:23px;padding:0px; margin:0px\" src=\"../assets/off.png\"></img>";
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
    echo 'no comittee';
}
if(isset($_POST["edit"]))
{
    echo 'editing';
    $id=$_POST["edit"];
    ?>
  <script type="text/javascript">
    window.location = "index.php?page=edit&id=<?php echo $id ?>&role=com";
    </script>
<?php }



if(isset($_POST["delete"]))
{
$committee_ID=$_POST["delete"];
$sql = "delete from committee where committee_ID='$committee_ID'";
$result=$conn->query($sql);
 ?>
 <script type="text/javascript">
window.location = "index.php?page=manage_com";
</script> 
<?php
 //Including dbconfig file.






}
if(isset($_POST["activate"]))
{
$committee_ID=$_POST["activate"];
$sql = "update committee set isactivated=b'0' where committee_ID='$committee_ID'";
$result=$conn->query($sql);
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_com\";

</script>" ;
}
if(isset($_POST["deactivate"]))
{
$committee_ID=$_POST["deactivate"];
$sql = "update committee set isactivated=b'1' where committee_ID='$committee_ID'";
$result=$conn->query($sql); 
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_com\";

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