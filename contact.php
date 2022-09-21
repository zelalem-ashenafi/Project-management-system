<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="./assets/dbu.png">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="./assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="./assets/asset/css/clean-blog.min.css" rel="stylesheet">
  <link rel="stylesheet" href="./assets/font-awesome/css/all.min.css">


  <!-- Vendor CSS Files -->
  <link href="./assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="./assets/DataTables/datatables.min.css" rel="stylesheet">
  <link href="./assets/DataTables/datatables.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="./assets/css/style.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="./assets/css/jquery-te-1.4.0.css">
  
  <script src="./assets/js/script.js"></script>
  <script src="./assets/jquery/jquery.min.js"></script>
  <script src="./assets/DataTables/datatables.min.js"></script>
  <script src="./assets/DataTables/datatables.js"></script>
  <script src="./assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  
    <script type="text/javascript" src="./assets/font-awesome/js/all.min.js"></script>
  <script type="text/javascript" src="./assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>

  <title>Contact us</title>
 	



</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#5193D1;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}	
	
.logo2 {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.8em;
    border-radius: 50% 50%;
    color: #000000b3;
}
.logo {
    margin: auto;
    font-size: 20px;
    width:50%;
    height:50%;
    padding: 5px 11px;    
    color: #000000b3;
}
	


ul{
  list-style: none
}
.dropdown-item{

}
.dropbtn {
  
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown ul{
  right:0px
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-right:20px;
}
ul{
  list-style: none
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  font-size:14px;
}



/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */

</style>
  <body>
  
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: #5193D1; border: 1px solid black ">
<div class="container" >
<a style="width:250px" href="index.php"><img class="logo " src="assets/DBU.png"></img></a>
  
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Home</a>
      </li>
     
      
      <li class="nav-item">
        <a class="nav-link" href="./contact.php">Contact</a>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropbtn">Log in</a>
        <ul class="dropdown-content" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="./stud/">Student</a></li>
        <li><a class="dropdown-item" href="./advisor/">Advisor</a></li>
         <li><a class="dropdown-item" href="./comitte/">Committee</a></li>
         <li><a class="dropdown-item" href="./examiner/">Examiner</a></li>
         <li><a class="dropdown-item" href="./department/">Department</a></li>
</ul>
      </li>
      <li class="nav-item dropdown ">
        <a class="nav-link dropbtn">Sign up</a>
        <ul class="dropdown-content" aria-labelledby="dropdownMenuButton1">
        <li><a class="dropdown-item" href="./stud/sign_up.php">Student</a></li>
        <li><a class="dropdown-item" href="./advisor/sign_up.php">Advisor</a></li>
         <li><a class="dropdown-item" href="./comitte/sign_up.php">Committee</a></li>
         <li><a class="dropdown-item" href="./examiner/sign_up.php">Examiner</a></li>
         <li><a class="dropdown-item" href="./department/sign_up.php">Department</a></li>
</ul>
      </li>
    </ul>
  </div>
</div>
</nav>

    <!-- Navigation -->
   
  <main id="main" class=" alert-info">
  		<div id="login-left">
  			<div class="logo2">
  				<img src="./assets/DBU.png"></img>
  			</div>
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
  					<form  action="" method="POST" >
  						<div class="form-group">
  							<label for="username" class="control-label">Your Email</label>
  							<input type="email" required  id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="comment" class="control-label">Comment</label>
  							<textarea rows="6" id="comment" name="comment" class="form-control"></textarea>
  						</div>
  						<center><input type="submit" name = "send" class="btn-sm btn-block btn-wave col-md-4 btn-primary"></center>
  					</form>
  				</div>
  			</div>
  		</div>
   
      <div class="text-center p-1" style="background-color:#5193D1;display:flex">
      Copyright &copy; 2022
        
  </div>
  </main>
  

  <?php
  if(isset($_POST["send"]))
  {
    include './stud/db_connect.php';
    $sender=$_POST['username'];
    $receiver="admin";
    $announce=$_POST['comment'];
    $now=date('Y-m-d H:i:00');	
    $conn->query("INSERT INTO annoncements (sender,receiver,st_date,announce_text) VALUES ('$sender','$receiver','$now','$announce')") or die(mysqli_error($conn)); 
    echo "<script type=\"text/javascript\">
            alert(\"Your message is sent successfully\"); 
            //window.location = \"index.php\";
  </script>";
}
  
  
  ?>



</body>

</html>