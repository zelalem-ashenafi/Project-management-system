<style>
  .list{
    width:100%;
    background-color: #CCCCCC;
    padding:20px;
    position:relative;
    margin-bottom:20px;
    margin-top:20px;
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

if(!isset($_SESSION['login_stud_id']))
echo "<script>window.location = \"index.php\";</script>";
include 'db_connect.php';
$stud_id=$_SESSION['login_stud_id'];
  $stud_name=$_SESSION['login_stud_name'];
$sql = "SELECT annonce_id,sender,receiver, dept_name,st_date,end_date, announce_text, file_name from annoncements where (receiver='$stud_id' or receiver='$stud_name' or receiver='') order by st_date desc";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    $st_date = date('Y-m-d H:i:00',strtotime($row['st_date']));
    $end_date =  date('Y-m-d H:i:00',strtotime($row['end_date']));
    $now=date('Y-m-d H:i:00');
    $file_name=$row['file_name'];
          
    if($row['sender']=='committee'||$row['sender']=='department'||($row['receiver']==$_SESSION['login_stud_id'])||($row['receiver']==$_SESSION['login_stud_name']))
    {
    $a_id=$row['annonce_id'];
    if($row["end_date"]=="")
    {
      echo '<div class="list"><div ><h2>From: '.$row['sender'].'</h2></div>
    <div ><h6>'.$row['st_date'].'</h6></div>
    <div >'.$row['announce_text'].'</div>
    
    <div class="attach">attachment: <a href="../files/'.$file_name.'">'.$file_name.'</a></div>
    <div class="list-btn"><form onSubmit="return validateform()"  method="post" action="">
    
    
    </form>
    </div></div>';
    }
    else{
    echo '<div class="list"><div ><h2>From: '.$row['sender'].'</h2></div>
    <div ><h6>Due date from: '.$row['st_date'].' to '.$row['end_date'].'</h6></div>
    <div >'.$row['announce_text'].'</div>
    
    <div class="attach">attachment: <a href="../files/'.$file_name.'">'.$file_name.'</a></div>
    <div class="list-btn"><form onSubmit="return validateform()"  method="post" action="">
    
    <button type="submit" name = "submit" value='.$a_id.'>Submit proposal</button>
    
    </form>
    </div></div>';}
    }
    
  }
} else {
  echo "No announcements";
}
if(isset($_POST['submit']))
{
  
  $aa=$_POST['submit'];
  $sql = "SELECT st_date,end_date from annoncements  where annonce_id='$aa' order by st_date desc";
  
  $result = $conn->query($sql);
  if ($result->num_rows > 0)  
    $row = $result->fetch_assoc();
    
    $st_date = new DateTime($row['st_date']);
    $end_date = new DateTime($row['end_date']);
    $now = new DateTime();
    $bool=$now<=$end_date;
   
    if(!$bool)
    { 
     
      echo "<script type=\"text/javascript\">
    alert(\"Time is up! it is closed. \");</script>"; 
   
  }
  else {
     echo "<script type=\"text/javascript\">
    
    window.location = \"index.php?page=submission_form&value=$aa\";
  </script>";
    
  
  }
}
?>