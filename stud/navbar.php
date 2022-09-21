<style>
	
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
	<?php
	$dept=$_SESSION['login_dept'];
	$sql = "SELECT * FROM department where Department='$dept'";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$isAllowed=$row['isshow'];
			$a=$row['adv_mark'];
			$p=$row['pres_mark'];
			$totP=$row['totpres_mark'];
			$d=$row['doc_mark'];
		}
	}
	
	?>	
		<div class="sidebar-list ">

				
				<a href="index.php?page=announces" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Announcement</a>
				<a href="index.php?page=submit_advisor" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Submit for Advisor</a>
				<a href="index.php?page=submit_evaluator" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Submit for Evaluator</a>
				<?php
				if($isAllowed)
				{?>
				<a href="index.php?page=show_results" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Show results</a>
				<?php }?>	
				<a href="index.php?page=projects" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Projects</a>
				<a href="index.php?page=feedback" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Feedback</a>
				
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>