<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="../assets/dbu.png">

	<title>SIGN UP- examiner</title>
     <link href="../assets/bootstrap5/bootstrap.min.css">
     <script src="../assets/bootstrap5/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
     <link href=".././assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="../assets/asset/css/clean-blog.min.css" rel="stylesheet">
</head>
<style>
body {
     
	background: #1690A7;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	flex-direction: column;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
     margin-top: 6%;
	width: 500px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}

h2 {
	text-align: center;
	margin-bottom: 40px;
}

input {
	display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
label {
	color: #888;
	font-size: 18px;
	padding: 10px;
}
select{
    display: block;
	border: 2px solid #ccc;
	width: 95%;
	padding: 10px;
	margin: 10px auto;
	border-radius: 5px;
}
.submitbtn {
	float: right;
	background: #5193D1;
	padding: 10px 15px;
	color: #fff;
	border-radius: 5px;
	margin-right: 10px;
	border: none;
}
button:hover{
	opacity: .7;
}
.error {
   background: #F2DEDE;
   color: #A94442;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

.success {
   background: #D4EDDA;
   color: #40754C;
   padding: 10px;
   width: 95%;
   border-radius: 5px;
   margin: 20px auto;
}

h1 {
	text-align: center;
	color: #fff;
}

.ca {
	font-size: 14px;
	display: inline-block;
	padding: 10px;
	text-decoration: none;
	color: #444;
}
.ca:hover {
	text-decoration: underline;
} 
</style>
<?
include('./header.php'); 
?>
<body>
<?php include('../nav_top.php'); ?>
  
</body>
</html>
<?php
include 'db_connect.php';
if(isset($_POST["signup"]))
{
    $id=$_POST["ev_id"];
    $name=$_POST["name"];
    $dept=$_POST["dept"];
    $password=$_POST["password"];
    $hashPassword = md5($password);
    $sql="insert into evaluators (ev_id,ev_name,dept,password) values ('$id','$name','$dept','$hashPassword')";
$conn->query($sql);
echo "<script type=\"text/javascript\">
            alert(\"Registered Succesfully\"); 
            window.location = \"index.php\";
  </script>";


}

?>