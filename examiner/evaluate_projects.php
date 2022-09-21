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
<?php 

?>
<form onSubmit="return validateform()"  action="" method="post" >

    <?php
    if(!isset($_SESSION['login_ev_id']))
    echo "<script>window.location = \"index.php\";</script>";
    include 'db_connect.php';
    $gr_mem=array();
    //var_dump($_SESSION);
    //  var_dump($_POST);
    
    $adv_name=$_SESSION['adv_name_ev'];
    
    //$sql = "select submissions.Group_name,submissions.Leader_ID,submissions.Advisor,stud_eva.stud_id,stud_eva.ev_id from submissions inner join stud_eva on stud_eva.stud_id=submissions.Leader_ID  where submissions.Advisor=\"$adv_name\";";
    $sql = "select * from submissions where Leader_id='$adv_name'";
    
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $dept=$row['dept'];
            $sql2 = "select * from department where Department='$dept'";
    
    
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
  
        while($row2 = $result2->fetch_assoc()) {
   
        $pres=$row2['pres_mark'];
        $totpres=$row2['totpres_mark'];
        $doc=$row2['doc_mark'];
            
        }
    }
            $group_name=$row['Group_name'];
             echo'<label><b>Project info</b> &nbsp</label> <ul><li>Group name: <strong>'.$group_name.'</strong></li><li><label style="margin-right:5px">Project file:   </label><a href="../files/'.$row['main_file'].'"><strong>'.$row['main_file'].'<i class="fa fa-download"></i></strong></a></li>
<tr><td>ID</td><td>Name</td><td>Documentation('.$doc.'%)</td><td>individual presentation('.$pres.'%)</td><td>Group presentation('.$totpres.'%)</td></tr>';
$ev_id=$_SESSION['login_ev_id']; 
$student_id=$row['Leader_ID'];          
$sql2 = "select groupmembers.stud_id,groupmembers.stud_name,groupmembers.mark_presentation,groupmembers.mark_documentation,groupmembers.mark_advisor,groupmembers.mark_total from groupmembers left join stud_eva on stud_eva.stud_id=groupmembers.leader_ID where stud_eva.stud_id='$student_id' group by groupmembers.stud_id;";
           
            $result2 = $conn->query($sql2);
            if ($result2->num_rows > 0) {
            
                while($row2 = $result2->fetch_assoc()) 
 { 
    
    $stu=$row2['stud_id'];
    $stu==""?$stu="name":$stu=$stu;
    array_push($gr_mem,$row2['stud_id']);        
    $mem=$row2['stud_id'];
    
   
    echo'<tr>
    <td style="padding-right:15px;">'.$stu.'</td>
    <td>'.$row2['stud_name'].'</td>
    <td><input class="doc" type="number" required name="'."doc".$mem.'" ></td>
    <td><input class="pres" type="number" name="'."ipres".$mem.'" required></td>
    <td><input class="totpres" type="number" name="'."pres".$mem.'" required></td>
    
    
    </tr>
    ';
}
          }
          else {
        echo "No students";
      }
        }
        
      } 
    else {
        echo "No students";
      }
?>
<tr></tr>
<tr></tr>
<tr></tr>
<tr>
<td>Rate the paper</td><td><div style="display:flex;width:50px"><div id="rateYo"></div><span style="margin-top:10px"; class='result'>0</span></div></td></tr>
<tr>
<td><input  type=hidden id=rater name=rate><input class="btn btn-primary btn-block" type="submit" name="submit" onclick="return calculateTot(<?php echo $pres; ?>,<?php echo $totpres; ?>,<?php echo $doc; ?>)"></td></tr>

</form>
</table>

<?php

if(isset($_POST["submit"]))
{
 
//  //Including dbconfig file.
$rate=$_POST['rate']?$_POST['rate']:0;
$dept=$_SESSION['login_dept'];
$now=date("Y-m-d H:i:00",);
foreach($gr_mem as $gr)
{
    $docmark=$_POST['doc'.$gr];
    $presmark=$_POST['pres'.$gr];
    $ipresmark=$_POST['ipres'.$gr];
    
    
    $sql="update groupmembers set mark_presentation= $presmark, mark_ipresentation= $ipresmark,mark_documentation= $docmark 
    where stud_id='$gr'";

    
    $conn->query($sql);
}
$sql2 = "select * from submissions where Leader_ID='$adv_name'";
    
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
  
        while($row2 = $result2->fetch_assoc()) {
            $proj_title=$row2['Title'];
            $proj_file=$row2['main_file'];
            //var_dump($row2);
        }
    }
$plain="INSERT INTO repository (proj_title,year,dept,project_file,rating) VALUES ('$proj_title','$now','$dept','$proj_file',$rate)";
//echo $plain;
    $conn->query($plain);
    $announce="You can check your Industrial project result";
    $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text) VALUES ('committee','$adv_name','$now',' $announce')"); 
    echo "<script type=\"text/javascript\">
            alert(\"Result recorded succesfully\"); 
            window.location = \"index.php\";
  </script>";
 }

 ?>

<script>
$(function () {
 $("#rateYo").rateYo({
                        numStars: 5
                      });
 $("#rateYo").rateYo()
             .on("rateyo.change", function (e, data) {

               var rating = data.rating;
               $(this).parent().find('.result').text(rating);
               $("#rater").val(rating);
               
             });
 
 });

function calculateTot(pres,totpres,doc)
{
    
    var els = document.getElementsByClassName("pres");
for(var i = 0; i < els.length; i++)
{
  presValue=els[i].value;
    if(presValue>pres)
    {
        alert("invalid input individual mark should be less than"+pres);
        return false;
    }
}
    var els = document.getElementsByClassName("totpres");
for(var i = 0; i < els.length; i++)
{
  presValue=els[i].value;
    if(presValue>totpres)
    {
        alert("invalid input group_presentation should be less than"+totpres);
        return false;
    }
}
    var els = document.getElementsByClassName("doc");
for(var i = 0; i < els.length; i++)
{
  presValue=els[i].value;
    if(presValue>doc)
    {
        alert("invalid input document mark should be >"+doc);
        return false;
    }
}
    
}


</script>
