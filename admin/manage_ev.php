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

input[type=submit]:hover {
 background-color: #00a7d1;
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


</style>

</head>
<body>
<form onSubmit="return validateform()"  method="post" action="">
  <table bgcolor="#f2f2f2" style="" align="center">

<?php

include 'db_connect.php';
//$ev_id=$_SESSION['login_ev_id'];

$sql = "select * from evaluators";
$result=$conn->query($sql);
if($result->num_rows>0)
{
  echo '<table bgcolor="#f2f2f2" style="padding:5px" align="center" id="table">';
 echo" <thead>";
  echo "<tr><th> </th><th>ev_id</th><th>ev_name</th><td id=\"buttons\">Operations</th></tr>";
  echo"</thead>";echo"<tbody";
  while($row=$result->fetch_assoc())
  {
      $ev_id=$row['ev_id'];
      $ev_name=$row['ev_name'];
      $is=$row['isactivated'];
        $isnew=$row['isnew']?"new":" ";
      $password=$row['password'];
  
      echo "<tr><td>$isnew</td><td>$ev_id</td><td>$ev_name</td>
  <td><button type=submit name=\"edit\" value=\"$ev_id\"><img style=\"width:23px;height:23px;\" src=\"../assets/edit.png\"></img></button>
  <button type=submit name=\"delete\" value=\"$ev_id\"><img style=\"width:23px;height:23px;\" src=\"../assets/delete.png\"></img></button>
  ";
  if($is)
  {
      echo "<button type=submit name=\"activate\" value=\"$ev_id\" ><img style=\"width:23px;height:23px;border:0px\" src=\"../assets/on.png\"></img>";
  }
  else {
      echo "<button type=submit name=\"deactivate\" value=\"$ev_id\" ><img style=\"width:23px;height:23px;padding:0px; margin:0px\" src=\"../assets/off.png\"></img>";
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
  echo 'no evaluators';
}

if(isset($_POST["delete"]))
{
$ev_id=$_POST["delete"];
$sql = "delete from evaluators where ev_id='$ev_id'";
$result=$conn->query($sql);
 ?>
 <script type="text/javascript">
window.location = "index.php?page=manage_ev";
</script> 
<?php
 //Including dbconfig file.






}
if(isset($_POST["edit"]))
{
    echo 'editing';
    $id=$_POST["edit"];
    ?>
  <script type="text/javascript">
    window.location = "index.php?page=edit&id=<?php echo $id ?>&role=ev";
    </script>
<?php }
if(isset($_POST["activate"]))
{
$ev_id=$_POST["activate"];
$sql = "update evaluators set isactivated=b'0' where ev_id='$ev_id'";
$result=$conn->query($sql);
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_ev\";

</script>" ;
}
if(isset($_POST["deactivate"]))
{
$ev_id=$_POST["deactivate"];
$sql = "update evaluators set isactivated=b'1' where ev_id='$ev_id'";
$result=$conn->query($sql); 
echo "<script type=\"text/javascript\">

window.location = \"index.php?page=manage_ev\";

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