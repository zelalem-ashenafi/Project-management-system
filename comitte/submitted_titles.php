<style>
    input
    {width: 50px;
    float: right;
    }
    table{
    width:100%;
    flex:auto;
    }
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
</body>
<?php
if(!isset($_SESSION['login_committee_ID']))
echo "<script>window.location = \"index.php\";</script>";
include 'db_connect.php';

$sql = "SELECT group_name,title_file,tsubmission_date, dept FROM submissions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo"<table border=3>
        <tr><th>Group Name</th><th>Proposal</th><th>Department</th><th>Submission date</th></tr>";
  while($row = $result->fetch_assoc()) {
    $file_name=$row['title_file'];
    echo"<tr><td>".$row['group_name']."</td><td><a href=\"../files/$file_name\">$file_name</a></td><td>".$row['dept']."</td><td>".$row['tsubmission_date']."</td></tr>";
    
     }
  
  echo'</table>
  <form onSubmit="return validateform()"  action="" method="POST">
  <input type="submit" value="Assign" name="submit"></input></form>';
} else {
  echo "No submissions";
}

if(isset($_POST["submit"]))
{
 ?>
  <script type="text/javascript">
window.location = "index.php?page=announcement_form";
</script>   
<?php
 //Including dbconfig file.






}

 ?>
