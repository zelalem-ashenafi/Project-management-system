<style>
  body {
    width: 100%;

    /*background: #007bff;*/
  }

  .logo {
    margin: auto;
    font-size: 20px;
    width: 50%;
    height: 50%;
    padding: 5px 11px;
    color: #000000b3;
  }



  ul {
    list-style: none
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
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" style="background-color: #5193D1; border: 1px solid black">
  <div class="container">
  <a style="width:250px" href="./"><img class="logo " src="../assets/DBU.png"></img></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">Home</a>
        </li>
      

        <li class="nav-item">
          <a class="nav-link" href="../contact.php">Contact</a>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropbtn">Log in</a>
          <ul class="dropdown-content" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="../stud/">Student</a></li>
            <li><a class="dropdown-item" href="../advisor/">Advisor</a></li>
            <li><a class="dropdown-item" href="../comitte/">Committee</a></li>
            <li><a class="dropdown-item" href="../examiner/">Examiner</a></li>
            <li><a class="dropdown-item" href="../department/">Department</a></li>
            
          </ul>
        </li>
        <li class="nav-item dropdown ">
          <a class="nav-link dropbtn">Sign up</a>
          <ul class="dropdown-content" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="../stud/sign_up.php">Student</a></li>
            <li><a class="dropdown-item" href="../advisor/sign_up.php">Advisor</a></li>
            <li><a class="dropdown-item" href="../comitte/sign_up.php">Committee</a></li>
            <li><a class="dropdown-item" href="../examiner/sign_up.php">Examiner</a></li>
            <li><a class="dropdown-item" href="../department/sign_up.php">Department</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>