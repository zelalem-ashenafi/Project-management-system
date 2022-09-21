<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" type="image/x-icon" href="assets/dbu.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RPMS - Debre Berhan University</title>

  <!-- Bootstrap core CSS -->
  <script src="assets/jquery/jquery.min.js"></script>
  <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom fonts for this template -->
  <link href="./assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="assets/asset/css/clean-blog.min.css" rel="stylesheet">

</head>
<style>
  .logo {
    margin: auto;
    font-size: 20px;
    width: 50%;
    height: 50%;
    padding: 5px 11px;
    color: #000000b3;
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

  .dropdown ul {
    right: 0px
  }

  /* Dropdown Content (Hidden by Default) */
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    margin-right: 20px;
  }

  ul {
    list-style: none
  }

  /* Links inside the dropdown */
  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    font-size: 14px;
  }

  /* Show the dropdown menu on hover */
  .dropdown:hover .dropdown-content {
    display: block;
  }

  /* Change the background color of the dropdown button when the dropdown content is shown */
</style>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: #5193D1; border: 1px solid black">
    <div class="container">
      <a style="width:250px" href="index.php"><img class="logo " src="assets/DBU.png"></img></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropbtn">Log in</a>
            <ul class="dropdown-content" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="stud/">Student</a></li>
              <li><a class="dropdown-item" href="advisor/">Advisor</a></li>
              <li><a class="dropdown-item" href="comitte/">Committee</a></li>
              <li><a class="dropdown-item" href="examiner/">Examiner</a></li>
              <li><a class="dropdown-item" href="department/">Department</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropbtn">Sign up</a>
            <ul class="dropdown-content" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="stud/sign_up.php">Student</a></li>
              <li><a class="dropdown-item" href="advisor/sign_up.php">Advisor</a></li>
              <li><a class="dropdown-item" href="comitte/sign_up.php">Committee</a></li>
              <li><a class="dropdown-item" href="examiner/sign_up.php">Examiner</a></li>
              <li><a class="dropdown-item" href="department/sign_up.php">Department</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('assets/asset/img/home-bg.jpg')" style="padding:0px;margin:0px;">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading" style="font-size:40px">
            <h1>RESEARCH and PROJECT MANAGEMENT SYSTEM</h1>
            <span class="subheading">A system that facilitate the project working process</span>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- Remove the container if you want to extend the Footer to full width. -->
  <div class="container-expand-lg my-0" style="padding: 0px;width:100%;margin:0px;">

    <div style="background-color: #eee6d3;" style="padding: 0px;width:100%;margin:0px;">
      <div class="container p-1">
        <div class="row">
          <div class="col-lg-6 col-md-12 mb-4">
            <h5 class="mb-3 text-dark">About DBU</h5>
            <p>
              DBU-RPMS is a backend management system which manages and facilitates the activities from starting the submission of title to storing the paper done in to well organized repository, it also create and manage accounts for each stakeholder in the paper working process.
            </p>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="mb-3 text-dark">links</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1">
                <a href="index.php" style="color: #4f4f4f;">HOME</a>
              </li>
              
              <li class="mb-1">
                <a href="stud/login.php" style="color: #4f4f4f;">Login</a>
              </li>
              <li>
                <a href="stud/sign_up.php" style="color: #4f4f4f;">Create account</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 mb-4">

          </div>
        </div>
      </div>
      <div class="text-center p-1" style="background-color: rgba(0, 0, 0, 0.2);">
        For more:
        <a class="text-dark" href="https://www.dbu.edu.et/">The university's page</a>
      </div>
      <div class="text-center p-1" style="background-color: #5193D1;">
      Copyright &copy; 2022
        
      </div>
      <!-- Copyright -->
    </div>

  </div>
  <!-- End of .container -->
  <?php
  function alertRedirect($message, $location)
  {
    echo '<script type="text/javascript">';
    echo 'alert("$message");';
    echo 'window.location.href = "$location";';
    echo '</script>';
  }

  ?>