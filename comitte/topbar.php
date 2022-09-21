<style>
	.logo {
    margin: auto;
    font-size: 20px;
    background: white;
    padding: 5px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
}
	img{
		width:100%;
		height:100%;
		
	}
</style>


<nav class="navbar navbar-expand" style="background: #5193D1;">
    <!-- Brand -->
	<a class="navbar-brand " href="#"><img src="../assets/DBU.png" style="width: 100px;"></img></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->

	<div class="topber__profile ml-auto">
            
			<img src="../assets/asset/img/avatar.png" style="margin-left:60px;height:45px; width:45px" class="rounded-circle" alt="profile">
			<div class="dropdown">
				<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<?php
					include 'db_connect.php';
					echo $_SESSION['login_committee_rep'];
					$stud_id=$_SESSION['login_committee_ID'];
					$dept=$_SESSION['login_college'];
					$query = "SELECT COUNT(*) newm FROM annoncements where isread= 0 and receiver='committee';";
					
					$result = mysqli_query( $conn, $query );
					$result?$newMessage = mysqli_fetch_assoc( $result ) : $newMessage['newm']=0;
					

					
				?>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="index.php">Dashboard</a>
					<a class="dropdown-item" href="index.php?page=profile">Profile</a>
					
					<a class="dropdown-item" href="ajax.php?action=logout"<?php echo $_SESSION['login_name'] ?>>Log Out</a>
				</div>
			</div>
	</div>

</nav>