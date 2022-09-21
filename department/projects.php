<!DOCTYPE html>
<?php
	
?>
<html lang = "eng">
	<head>
<link rel="icon" type="image/x-icon" href="../assets/dbu.png">

		
		<meta charset = "UTF-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
	
	</head>
<body>
<!--------------------HEAD---------------------->

<?php include 'db_connect.php'?>
<main>
<!-------------------SIDEBAR0------------------>
<form onSubmit="return validateform()"  method=POST action="">
		<div id = "sidecontent" class = "well pull-right">
				
						<table id = "table" class = "table table-bordered">
							<thead>
								<tr>
									<th>Doc id</th>
									<th>Paper title</th>
									<th>year</th>
									<th>Department</th>
									<th>File</th>
									<th><span title="5 - excellent project paper
4 - very-good project paper
3 - good project paper
2 - enough project paper
1 - bad project paper
0 - failed project paper">Rating</span></th>
									<th>Delete</th>
									
									
								</tr>
							</thead>
							<tbody>
								<?php
									if(!isset($_SESSION['login_department_ID']))
                                    echo "<script>window.location = \"index.php\";</script>";
                                    include 'db_connect.php';
                                    
                                    $stud_dept=$_SESSION['login_Department'];
									
                                    if($stud_dept=="Information system"||$stud_dept=="Computer science"||$stud_dept=="Information technology"||$stud_dept=="Software engineering")
                                    {
                                    $sql = "SELECT * FROM repository where dept=\"Information system\" OR dept=\"Computer science\" OR dept=\"Information technology\" OR dept=\"Software engineering\"";
                                    }
                                    else
                                    {
                                    $sql = "SELECT * FROM repository where dept=\"$stud_dept\"";
                                    }
                                    
                                    
                                    $result = $conn->query($sql);
                                    
                                    if ($result->num_rows > 0) {
                                    
                                    while($row = $result->fetch_assoc()) {
                                    $doc_id=$row['doc_id'];
                                    $title=$row['proj_title'];
                                    $year=$row['year'];
                                    $dept=$row['dept'];
                                    $file=$row['project_file'];
                                    $rating=$row['rating'];
                                    ?><tr>
									<td><?php echo $doc_id?></td>
									<td><?php echo $title?></td>
									<td><?php echo $year?></td>
									<td><?php echo $dept?></td>
									<td><a href="../files/<?php echo $file ?>"><?php echo $file?><i class="fa fa-download" ></i> </a></td>
									<td><?php echo $rating?></td>
									<?php echo"<td>
    <button type=submit name=\"delete\" value=\"$doc_id\"><img style=\"width:23px;height:23px;\" src=\"../assets/delete.png\"></img></button>"?>
									
								</tr>
                            <?php        
                            }
                                }
								?>
							</tbody>
						</table>
	<form onSubmit="return validateform()" >			
							</main>	
</body>	

<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>


</html>
<?php
if(isset($_POST["delete"]))
{
$doc_id=$_POST["delete"];
$sql = "delete from repository where doc_id='$doc_id'";
$result=$conn->query($sql);
 ?>
 <script type="text/javascript">
window.location = "index.php?page=projects";
</script> 
<?php
 //Including dbconfig file.






}
if(isset($_POST["edit"]))
{
    //echo 'editing';
    $id=$_POST["edit"];
    ?>
  <script type="text/javascript">
    window.location = "index.php?page=edit_doc&id=<?php echo $id ?>&role=adv";
    </script>
<?php }
?>