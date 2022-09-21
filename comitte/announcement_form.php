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
<form onSubmit="return validateform()"  action="" method="post">
<?php
if(!isset($_SESSION['login_committee_ID']))
echo "<script>window.location = \"index.php\";</script>";
    $data=array();
    $numrows=0;
    $i=0;
    include 'db_connect.php';
    
    $sql = "SELECT group_name,Leader_ID FROM submissions where advisor = ''";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $numrows=$result->num_rows;
        echo"<table border=0>
        <tr><td>Group Name</td><td>Title</td><td>status</td><td>Advisor assigned</td></tr>";
      while($row = $result->fetch_assoc()) {
        echo '<tr><td>'.$row['group_name'].'</td><td><input required cols= 10 type="input" name="'.$i.'"></td><td>
        <select name="status'.$i.'" id="status">
        <option value="accepted">Accepted</option>
        <option value="rejected">Rejected</option>

        </select>';
        $sql2 = "SELECT adv_id, adv_name FROM advisors where student_id=''";
        $result2 = $conn->query($sql2);
        $name="adv".$i;
        echo'<td><select name='.$name.' id="advisor"">';
        while($row2 = $result2->fetch_assoc()) {
          
          echo '<option value="'.$row2['adv_id'].'">'.$row2['adv_name'].'</option>';
        }
        echo '<input type="hidden" name="leader_id'.$i.'" value="'.$row['Leader_ID'].'"> <td></td></tr>';
        
        
        array_push($data, $row['group_name']);
        $i++;
      }
      echo"</table>";echo"<input type=\"submit\" value=\"Assign\" name=\"submit\">";
      
      
    } else {
      echo "No data found";
    }
    if(isset($_POST["submit"]))
    {
        $name = "Commitee";
        $st_date =  date("Y-m-d H:i:00",);
        
        for($x=0; $x<$numrows; $x++)
        {
          $group_leader=$_POST['leader_id'.$x];
        
          $groupInput=$_POST["$x"];
          $groupStat=$_POST["status".$x];
          $groupAdvisor=$_POST["adv".$x];
          $sql2 = "SELECT adv_id, adv_name FROM advisors where adv_id='$groupAdvisor'";
          //echo $sql2;
          $result2 = $conn->query($sql2);
          while($row2 = $result2->fetch_assoc()) {
              $adv_name=$row2['adv_name'];

          }
          $sql2 = "SELECT stud_id, stud_name FROM students where stud_id='$group_leader'";
          //echo $sql2;
          $result2 = $conn->query($sql2);
          while($row2 = $result2->fetch_assoc()) {
              $leader_name=$row2['stud_name'];

          }
          $announce="Dear $adv_name you are selected as an advisor for the $data[$x] team with the title $groupInput.";
          $conn->query("update submissions set title= '$groupInput', status= '$groupStat', advisor='$groupAdvisor' where group_name='$data[$x]'");
          if($groupStat=='accepted')
          {
            $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text) VALUES ('$name','$groupAdvisor','$st_date','$announce')");
            $announce="your proposal in the title of $groupInput is accepted and your assigned advisor is $adv_name. Contact your advisor as soon as possible";
            $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text) VALUES ('$name','$group_leader','$st_date','$announce')");  
            $queri="update advisors set student_id='$group_leader' where adv_id='$groupAdvisor'";
            //echo $queri;
            $conn->query($queri);
            
          }
          else if($groupStat=='rejected')
          {
            $announce="your title is rejected please submit other titles within the due date";
            $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text) VALUES ('$name','$group_leader','$st_date','$announce')"); 
          }    
          
        }
        
       // $conn->query("update table submissions set title= ('$name','$st_date','$end_date','$announce')");  
        echo "<script type=\"text/javascript\">
            alert(\"Assigned successfully\"); 
            window.location = \"index.php\";
  </script>";  
  
        // $conn->query("update table submissions set title= ('$name','$st_date','$end_date','$announce')");  
          
        
    }
?>


</form>
</table>
</body>

  

