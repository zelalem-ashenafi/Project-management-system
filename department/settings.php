<style>

    input{
        width:100px;
    }
    </style>
<?php
$dept_id=$_SESSION["login_department_ID"];
$sql = "select * from department where department_ID='$dept_id'";

$result=$conn->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
    $isCommittee=$row['giveCommittee'];
    $adv=$row['adv_mark'];
    $pres=$row['pres_mark'];
    $totpres=$row['totpres_mark'];
    $doc=$row['doc_mark'];
    }
}
$value=$isCommittee=='0'?"1":"0";
$src=$isCommittee=='0'?"../assets/off.png":"../assets/on.png";

?>

<table style="width:60%;">
<tr>
<form onSubmit="return validateform()"  method="post" action="">
    <td >Give Permission for Committee</td><td><button type="submit" name="deactivate" value="<?php echo $value;  ?>" ><img style="width:23px;height:23px;padding:0px; margin:0px" src="<?php echo $src;  ?>"></img></button></td>
</tr>
<tr> </tr>
<tr> </tr>
<tr> </tr>

<tr>
    
<td> <b>Advising evaluation: <b></td><td><input type="number" class= "num" name="adv" value="<?php echo $adv ?>"></td></tr>
<tr><td> <b>Individual Presentation evaluation: <b></td><td><input type="number" class= "num" name="pres" value="<?php echo $pres ?>"></td></tr>
<tr><td> <b>Overall presentation evaluation: <b></td><td><input type="number" class= "num" name="totpres" value="<?php echo $totpres ?>"></td></tr>
<tr><td> <b>Documentation evaluation: <b></td><td><input type="number" name="doc" class= "num" value="<?php echo $doc ?>"></td></tr>
<tr></tr>
</table><button style="" type="submit" name="edit" value="edit" >Set point</button>
</form>
<?php
if(isset($_POST["deactivate"]))
{
$adv_id=$_POST["deactivate"];
$cell=$adv_id=="0"?"1":"0";
$sql = "update department set giveCommittee=b'$adv_id' where department_ID='$dept_id'";

$result=$conn->query($sql);
echo "<script type=\"text/javascript\">
window.location=\"index.php?page=settings\";


</script>" ;
}
if(isset($_POST["edit"]))
{
    $adv=$_POST['adv'];
    $pres=$_POST['pres'];
    $totpres=$_POST['totpres'];
    $doc=$_POST['doc'];
    $conn->query("update department set adv_mark='$adv',pres_mark='$pres',totpres_mark='$totpres',doc_mark='$doc' where department_ID='$dept_id'");
    echo "<script>alert('succesfully set point');window.location = \"index.php?page=settings   \";</script>";
}
?>