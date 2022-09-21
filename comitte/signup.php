<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/x-icon" href="../assets/dbu.png">

	<title>SIGN UP-COMMITTEE</title>
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
     <form onSubmit="return validateform()"  action="" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Committee Representative ID</label>
          <?php if (isset($_GET['com_id'])) { ?>
               <input type="text" required  
                      name="com_id" 
                      placeholder="id"
                      value="<?php echo $_GET['com_id']; ?>"><br>
          <?php }else{ ?>
               <input type="text" required  
                      name="com_id" 
                      placeholder="id"><br>
          <?php }?>

          <label>Committee Representative  Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" required  
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" required  
                      name="name" 
                      placeholder="name"><br>
          <?php }?>

          <label>Committee Member list</label>
          <input type="text" required  name="member1" placeholder="member1"> 
          <input type="text" required  name="member2" placeholder="member2"> 
          <input type="text" required  name="member3" placeholder="member3"> 

            <label>College</label><br>
            <select name="college">
            <option>Accounting and Finance	</option>
<option>Natural and Computational science	</option>
<option> Social Science and Humanities	</option>
<option>Agriculture and natural Resources	</option>
<option>Business and Economics	</option>
<option>Computing College	</option>
<option>Engineering	</option>
<option>Health science	</option>
<option>Medicine	</option>
<option>Education	</option>

            </select><br>


     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Re_Password"><br>

     	<input class="submitbtn" type="submit" name="signup" value="Sign up">
     </form>
</body>
</html>
<?php
include 'db_connect.php';
if(isset($_POST["signup"]))
{
    $id=$_POST["com_id"];
    $name=$_POST["name"];
    $college=$_POST["college"];
    $password=$_POST["password"];
    $hashPassword = md5($password);
    $list=$_POST['member1'].",".$_POST['member2'].",".$_POST['member3'];
    $sql="insert into committee (committee_id,committee_rep,committee_list,college,password) values ('$id','$name','$list','$college','$hashPassword')";
    ////echo $sql;
    echo "<script type=\"text/javascript\">
            alert(\"Registered Succesfully\"); 
            window.location = \"index.php\";
  </script>";
//$conn->query($sql);


}

?>