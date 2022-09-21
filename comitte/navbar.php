
<?php

$dept=$_SESSION['login_college'];
if($dept=='Computing College')
{
	$sql = "SELECT giveCommittee FROM department where Department='software engineering' or Department='information system' or Department='information technology' or Department='computer science';";
}
else{
	$sql = "SELECT giveCommittee FROM department where Department='$dept'";
}


$result = $conn->query($sql);
$isAllowed="1";
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$isAllowed=$row['giveCommittee'];
	}
	

}

?>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				<?php
				if($isAllowed)
				{?>

				
				<a href="index.php?page=announce" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Call for proposal</a>
				<a href="index.php?page=submitted_titles" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Submitted Titles</a>
				<a href="index.php?page=select_evaluators" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Evaluator selection</a>
				<?php }?>	
				<a href="index.php?page=generate_report" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Generate Report </a>
				<a href="index.php?page=projects" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Papers </a>
				<a href="index.php?page=feedback" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Feedback</a>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>