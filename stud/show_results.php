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
	
    text-decoration:bold;/*border-left:1px solid gray;*/
    width: 100%;
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
<br/><br/>
<form onSubmit="return validateform()"  method="post" action="">
    <table bgcolor="#f2f2f2" style="padding:50px" align="center">
                                          
    <tr><td>stud_id</td><td>stud_name</td><td>mark_presentation<?php echo"{$totP}%" ?></td><td>Individual presentation<?php echo"{$p}%" ?></td><td>mark_documentation<?php echo"{$d}%" ?></td><td>mark_advisor<?php echo"{$a}%" ?></td><td>mark_total%100</td><td>Grade</td></tr>
	

<?php
if(!isset($_SESSION['login_stud_id']))
echo "<script>window.location = \"index.php\";</script>";
include 'db_connect.php';
$stud_id=$_SESSION['login_stud_id'];

$sql = "SELECT *, (select case 
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
                  )as grade FROM groupmembers where leader_id=\"$stud_id\"";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    $id=$row['stud_id'];
    $name=$row['stud_name'];
    $pres=$row['mark_presentation'];
    $ipres=$row['mark_ipresentation'];
    $doc=$row['mark_documentation'];
    $adv=$row['mark_advisor'];
    $tot=$row['mark_total'];
    $grade=$row['grade'];
    echo "<tr><td>$id</td><td>$name</td><td>$pres</td><td>$ipres</td><td>$doc</td><td>$adv</td><td>$tot</td><td>$grade</td></tr>";
  }

} else {
  echo "no data found";
}

if(isset($_POST["More"]))
{
$_SESSION['adv_name_ev']=$_POST['sender']
 ?>
 <script type="text/javascript">
window.location = "index.php?page=evaluate_projects";
</script> 
<?php
 //Including dbconfig file.






}

 ?>
</form>
</body>