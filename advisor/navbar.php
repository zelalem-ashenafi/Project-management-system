<style>
	
</style>

<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				
				<a href="index.php?page=announces" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Announcements</a>
				<a href="index.php?page=comment_stud" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Comment on project</a>
				<a href="index.php?page=submit_mark" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Submit Mark</a>
				<a href="index.php?page=projects" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Papers </a>
				<a href="index.php?page=feedback" class="nav-item nav-files"><span class='icon-field'><i class="fa fa-file"></i></span> Feedback</a>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>