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
.bottom_border{
  border-bottom: solid .5px black;

}

</style>

</head>
<body>
<table bgcolor="#f2f2f2" style="padding:50px" align="center">
</body>
<?php
if(!isset($_SESSION['login_department_ID']))
echo "<script>window.location = \"index.php\";</script>";
include 'db_connect.php';
$department=$_SESSION['login_Department'];
$sql = "SELECT *, submissions.dept as department FROM submissions inner join advisors on advisors.adv_id=submissions.Advisor where submissions.dept ='$department';";
////echo $sql;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  echo"<table style=\"text-align:center\" border=3>
        <tr><th>No</th><th>proposal file</th><th>Selected Title</th><th>Group</th><th>Final File</th><th>Member list</th><th>Grade</th><th>Advisor</th><th>Examiner</th></tr>";
        $i=0;
  while($row = $result->fetch_assoc()) {
    
    $file_name=$row['title_file'];
    ++$i;
    echo"<tr><td rowspan=\"6\" >$i</td>
    <td rowspan=\"6\" ><a href=\"../files/".$row['title_file']."\">".$row['title_file']."<i class=\"fa fa-download\" ></i></a></td>
    <td rowspan=\"6\" >".$row['Title']."</td>
    <td rowspan=\"6\" >".$row['Group_name']."</td>
    <td rowspan=\"6\" ><a href=\"../files/".$row['main_file']."\">".$row['main_file']."<i class=\"fa fa-download\" ></i></a></td>";
    $group=$row['Group_name'];
    $sql2 = "SELECT *,(select groupmembers.stud_name) as name,(select groupmembers.stud_id) as id, (select case 
    when mark_total>=90 then 'A+'
    when mark_total>=85 then 'A'
    when mark_total>=80 then 'A-'
    when mark_total>=75 then 'B+'
    when mark_total>=70 then 'B'
    when mark_total>=65 then 'B-'
    when mark_total>=60 then 'C+'
    when mark_total>=50 then 'C'
    when mark_total>=45 then 'C-'
    when mark_total>=40 then 'D'
    when mark_total>0 then 'F'
    when mark_total=0 then '-'
    else 'F' end 
    )as grade FROM groupmembers inner join submissions on groupmembers.leader_id=submissions.Leader_id  where submissions.dept='$department' and submissions.Group_name='$group'";
    ////echo $sql2;
    $result2 = $conn->query($sql2);
    $arr = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    //var_dump($arr);
    echo"<td>";
    foreach($arr as $row2)
    {
      echo"<div class=\"bottom_border\">".$row2["name"]."</div>";
    }
    echo"</td>";
    echo"<td>";
    foreach($arr as $row2)
    {
      
      echo"<div class=\"bottom_border\">".$row2["grade"]."</div>";
    }
    echo"</td>";
    $leader_id=$row['Leader_ID'];
    $q="select * from stud_eva inner join evaluators on stud_eva.ev_id=evaluators.ev_id where stud_id='$leader_id' ";
    //echo $q;
    $result2 = $conn->query($q);
    $arr2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
    echo"
    <td rowspan=\"6\" >".$row['adv_name']."</td>";
    echo"<td>";
    foreach($arr2 as $row2)
    {
      
      echo"<div class=\"bottom_border\">".$row2["ev_name"]."</div>";
    }
    echo"</td>";
    
    echo"
    
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
