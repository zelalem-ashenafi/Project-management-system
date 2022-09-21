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
<br/><br/><br/><br/><br/>
<table bgcolor="#f2f2f2" style="padding:50px" align="center">
</body>
<?php
if(!isset($_SESSION['login_committee_ID']))
echo "<script>window.location = \"index.php\";</script>";
include 'db_connect.php';
$college=$_SESSION['login_college'];
if($college=='Computing College')
$sql = "SELECT *, submissions.dept as department FROM submissions inner join advisors on advisors.adv_id=submissions.Advisor where submissions.dept='software engineering' or submissions.dept='information system' or submissions.dept='information technology' or submissions.dept='computer science';";
else
$sql = "SELECT *, submissions.dept as department FROM submissions inner join advisors on advisors.adv_id=submissions.Advisor where submissions.dept ='$college';";
////echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  echo"<table border=3>
        <tr><th>No</th><th>Selected Title</th><th>Group</th><th>Department</th><th>Advisor</th><th>Evaluators</th></tr>";
        $i=0;
  while($row = $result->fetch_assoc()) {
    $sql2 = "select * from stud_eva inner join evaluators on stud_eva.ev_id=evaluators.ev_id where stud_eva.stud_id='{$row['Leader_ID']}' ;";
    //  //echo $sql2;
    $result2 = $conn->query($sql2);
    $file_name=$row['title_file'];
    ++$i;
    echo"<tr><td>$i</td><td>".$row['Title']."</td><td>".$row['Group_name']."</td><td>".$row['department']."</td><td>".$row['adv_name']."</td>
    <td>";
    while($row2 = $result2->fetch_assoc()) {
    echo "<div>".$row2['ev_name']."</div>";
    }
    "</td>
    </tr>";
    
     }
  
  echo'</table>';
} else {
  echo "No data found";
}

if(isset($_POST["submit"]))
{
 ?>
  <script type="text/javascript">
window.location = "index.php?page=announcement_form";
</script>   
<?php

}

 ?>
