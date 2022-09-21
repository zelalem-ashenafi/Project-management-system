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
 border: 1px solid black;
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
 border: 1px solid black;
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
    <?php
    $stud_list=array();
    if(!isset($_SESSION['login_adv_id']))
    echo "<script>window.location = \"index.php\";</script>";
    $ev_id=array();
    $ev_name=array();
    //var_dump($_SESSION);
    $adv_name=$_SESSION['login_adv_name'];
    $adv_id=$_SESSION['login_adv_id'];
    $adv_dept=$_SESSION['login_dept'];
    include 'db_connect.php';

        
            $sql2 = "select adv_mark from department where Department='$adv_dept'";
    
    
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
  
        while($row2 = $result2->fetch_assoc()) {
   
        $adv_mark=$row2['adv_mark'];
        
            
        }
    }
?>
<table border="2"  bgcolor="#f2f2f2" style="padding:50px" align="center">
<form onSubmit="return calculateTot(<?php echo $adv_mark; ?>)"  enctype="multipart/form-data" action="" method="post">
<tr>
    

<td>ID</td><td>Name</td><td> <b>advisor_point(<?php echo $adv_mark; ?>%): <b></td><td></td></td>
</tr>
<?php
$lId = $_SESSION['login_student_id'];
$sql = "select * from groupmembers where leader_id='$lId'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        
        $Mname= $row['stud_id'];
        $Mid= $row['stud_name'];
        array_push($stud_list,$Mname);
        echo'<tr>
        <td style="padding-right: 20px ">'.$Mname.'</td>
        <td>'.$Mid.'</td>
        
        <td><input required type="number" class= "adv_mark" name="'."adv".$Mname.'" ></td>
        </tr>';     

}
      
    
  } else {
    echo "No Students found";
  }

?>
<tr></tr>
<tr></tr>
<tr></tr>


<tr>
<td><input type="submit" name="submit"></td></tr>

</form>
</table>

<?php
if(isset($_POST["submit"]))
{
 //var_dump($_POST);

 
$sender=$_SESSION['login_adv_name'];
//$receiver=$Leader_id;
$now=date('Y-m-d H:i:00');


        foreach($stud_list as $list)
    {
        $v='adv'.$list;
        $point=$_POST[$v];
        $list==""?$list="hello":$list=$list;
        echo $list;
        $conn->query("update groupmembers set mark_advisor=$point where stud_id='$list'");
        echo "<script type=\"text/javascript\">
           alert(\"Result Submitted Succesfully\"); 
            window.location = \"login.php\";
  </script>";
    }
       
}

 ?>
 <script>
function calculateTot(adv_mark)
{
    
    var els = document.getElementsByClassName("adv_mark");
for(var i = 0; i < els.length; i++)
{
  advValue=els[i].value;
    if(advValue<0||advValue>adv_mark)
    {
        alert("invalid input individual mark should be less than"+adv_mark);
        return false;
    }
}
  
}
</script>