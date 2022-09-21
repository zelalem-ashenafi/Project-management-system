<!DOCTYPE html>
<html lang="en">

<head>
<link rel="icon" type="image/x-icon" href="../assets/dbu.png">

  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href=".././assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/asset/css/clean-blog.min.css" rel="stylesheet">
  <title>Student Sign_up | RPMS</title>
 	

<?php include('./header.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_stud_id']))
header("location:index.php");
?>

</head>
<style>
          body {
               margin: 0;
          }

          main {
               width: 100%;
               background: #1690A7;
               display: flex;
               justify-content: center;
               align-items: center;
margin-top: 0;
padding-top: 0;
               flex-direction: column;
          }

          * {
               font-family: sans-serif;
          }

          form {
               margin-top: 17%;
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
               font-size: 15px;
          }

          label {
               color: #888;
               font-size: 18px;
               padding: 10px;
          }

          select {
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

          button:hover {
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
  <body>

    <!-- Navigation -->
    <?php include '../nav_top.php';?>
    <br/> <br/>
    
    <main id="main" class=" alert-info">
          <div class="body">
               <form onSubmit="return validateform()" action="" method="post">
                    <h2>SIGN UP</h2>

                    <?php if (isset($_GET['error'])) { ?>
                         <p class="error"><?php echo $_GET['error']; ?></p>
                    <?php } ?>

                    <?php if (isset($_GET['success'])) { ?>
                         <p class="success"><?php echo $_GET['success']; ?></p>
                    <?php } ?>

                    <label>Student ID</label>
                    <?php if (isset($_GET['stud_id'])) { ?>
                         <input type="text" required name="stud_id" placeholder="DBUR/0000/00" value="<?php echo $_GET['stud_id']; ?>"><br>
                    <?php } else { ?>
                         <input type="text" required name="stud_id" placeholder="Student ID"><br>
                    <?php } ?>

                    <label>Student Name</label>
                    <?php if (isset($_GET['name'])) { ?>
                         <input type="text" required name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
                    <?php } else { ?>
                         <input type="text" required name="name" placeholder="name"><br>
                    <?php } ?>
                    <label>Department</label><br>
                    <select name="dept">
                         <option>Accounting and Finance </option>
                         <option>Agricultural Econamics </option>
                         <option>Amharic </option>
                         <option>Anesthesia </option>
                         <option>Animal Science </option>
                         <option>Biology </option>
                         <option>Biotechnology </option>
                         <option>chemical engineering </option>
                         <option>Chemistry </option>
                         <option>Civics and Ethical Studies </option>
                         <option>Civil engineering </option>
                         <option>computer science </option>
                         <option>Construction Technology and mgt </option>
                         <option>Economics </option>
                         <option>Electrical engineering </option>
                         <option>English </option>
                         <option>Food engineering </option>
                         <option>Geography and Environmental Studies </option>
                         <option>Geology </option>
                         <option>Health Officer (HO) </option>
                         <option>History and Heritage Management </option>
                         <option>Horticulture </option>
                         <option>Hydraulic and water resource eng </option>
                         <option>industrial engineering </option>
                         <option>information system </option>
                         <option>information technology </option>
                         <option>Journalism and Comnication </option>
                         <option>Law </option>
                         <option>Logistics and supply chain </option>
                         <option>Management </option>
                         <option>Marketing </option>
                         <option>Mathematics </option>
                         <option>Mechanical Engineering </option>
                         <option>Medical laboratory </option>
                         <option>Medicine (MD) </option>
                         <option>Midwifery </option>
                         <option>Natural Resource Min </option>
                         <option>Neonatal Nursing </option>
                         <option>Nursing </option>
                         <option>pediatric Nursing </option>
                         <option>Pharmacy </option>
                         <option>Physics </option>
                         <option>Plant Science </option>
                         <option>Psychology </option>
                         <option>Sociology </option>
                         <option>software engineering </option>
                         <option>Sport Science </option>
                         <option>statistics </option>
                         <option>Surgical Nursing </option>
                         <option>Survey engineering </option>
                         <option>Tourism and Hotel Management </option>
                    </select><br>


                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password"><br>

                    <label>Confirm Password</label>
                    <input type="password" name="re_password" placeholder="Re_Password"><br>
                    <input class="submitbtn" type="submit" name="signup" value="Sign up">
               </form>
          </div>
    </main>
    <div class="text-center p-1" style="background-color: #5193D1;">
      Copyright &copy; 2022
        
  </div>


    
</body>
</html>
<?php
include 'db_connect.php';
if (isset($_POST["signup"])) {
     $id = $_POST["stud_id"];
     $name = $_POST["name"];
     $dept = $_POST["dept"];
     $password = $_POST["password"];
     $hashPassword = md5($password);
     $sql = "insert into students (stud_id,stud_name,dept,password) values ('$id','$name','$dept','$hashPassword')";
     $conn->query($sql);
     echo "<script type=\"text/javascript\">
     alert(\"Registered Succesfully\"); 
     window.location = \"index.php\";
     </script>";
}

?>