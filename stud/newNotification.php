<style>
body{
 margin:0px;
 font-family:Baskerville, 'Palatino Linotype', Palatino, 'Century Schoolbook L', 'Times New Roman', serif;
 }
input[type=submit]:hover {
 background-color: #00a7d1;
}
input[type=submit] {
    
 border: none;
 color: white;
 padding: 14px 20px;
 background-color: #01c9fb;
 margin: 8px 0;
 cursor: pointer;
 border-radius: 4px;
 
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
</style>
<?php

  $stud_id=$_SESSION['login_stud_id'];
  $stud_name=$_SESSION['login_stud_name'];
$sql = "SELECT annonce_id, sender,receiver,st_date, announce_text, isread from annoncements  where (receiver='$stud_id' or receiver='$stud_name' or receiver='') and isread=0 order by st_date";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    $st_date = date('Y-m-d H:i:00',strtotime($row['st_date']));
    //$end_date =  date('Y-m-d H:i:00',strtotime($row['end_date']));
    $now=date('Y-m-d H:i:00');
    $isread=$row['isread'];
    $receiver=$row['receiver'];
    $sender=$row['sender'];
    $ann_id=$row['annonce_id'];
    
    echo '<div class="list"><div ><h2>From: '.$sender.'</h2></div>
    <div ><h6>Due date from: '.$st_date.'</h6></div>
    <div >'.$row['announce_text'].'</div>
    <div class="list-btn"><form onSubmit="return validateform()"  method="post" action="">
    <input type="submit" name= "More">
    
    </form>
    </div></div>';
    $sql="UPDATE annoncements SET isread=1 WHERE annonce_id = '$ann_id';";
    
    $conn->query($sql); 
  }
} else {
  echo "No new notification";
  
}

?>