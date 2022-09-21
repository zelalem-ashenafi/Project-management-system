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
if(!isset($_SESSION['login_id']))
echo "<script>window.location = \"index.php\";</script>";
include 'db_connect.php';

$sql = "SELECT annonce_id, sender,receiver,st_date, announce_text, isread from annoncements  where receiver='admin' and isread=0 order by st_date desc";

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
    if(!$isread)
    {
    echo '<div class="list"><div ><h2>Feedback From: '.$sender.'</h2></div>
    <div ><h6>'.$st_date.'</h6></div>
    <div >'.$row['announce_text'].'</div>
    <div class="list-btn"><form onSubmit="return validateform()"  method="post" action="">
    <input type="submit" name= "More">
    
    </form>
    </div></div>';
    $sql="UPDATE annoncements SET isread=1 WHERE annonce_id = '$ann_id';";
    ?>
    <?php
    $conn->query($sql); 
    }
  }
} else {
  echo "No new messages";
}
if(isset($_POST["submit"]))
{
 ?>
  <script type="text/javascript">
window.location = "index.php?page=submission_form";
</script>   
<?php
 //Including dbconfig file.






}

 ?>
