<style>
	
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				
				<a href="index.php?page=manage_stud" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Manage Student accounts</a>
				<a href="index.php?page=manage_adv" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Manage Advisor accounts</a>
				<a href="index.php?page=manage_com" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Manage Committee accounts</a>
				<a href="index.php?page=manage_ev" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Manage Examiner accounts</a>
				<a href="index.php?page=manage_dept" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Manage Department accounts</a>
				<a href="index.php?page=message" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> View Feedback</a>
				
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>