<style>
    .logo {
        margin: auto;
        font-size: 20px;
        background: #5193D1;
        
    
        color: #000000b3;
    }

    img {
        width: 100%;
        height: 100%;

    }
</style>



<nav class="navbar navbar-expand" style="background: #5193D1;">
    <!-- Brand -->
    <a class="navbar-brand " href="#"><img src="../assets/DBU.png" style="width: 90px;"></img></a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    include 'db_connect.php';

    $stud_id = $_SESSION['login_stud_id'];
    $stud_name = $_SESSION['login_stud_name'];
    $query = "SELECT COUNT(*) newm FROM annoncements where isread= 0 and (receiver='$stud_id' or receiver='$stud_name' or receiver='')";

    $result = mysqli_query($conn, $query);
    $newMessage = mysqli_fetch_assoc($result);


    ?>
    <!-- Navbar links -->
    <div class=" navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="index.php?page=newNotification" class="nav-link ml-2 notification" style="width: fit-content;">
                    <i class="fa fa-bell"></i>
                    <span class="badge"><?php echo $newMessage['newm'] ?></span></a>
            </li>
        </ul>
    </div>

                <div class="topber__profile">

                    <img src="../assets/asset/img/avatar.png" style="margin-left:60px;height:45px; width:45px" class="rounded-circle" alt="profile">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['login_stud_name']; ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="index.php">Dashboard</a>
                            <a class="dropdown-item" href="index.php?page=profile">Change Profile</a>
                            <a class="dropdown-item" href="index.php?page=newNotification">Notification &nbsp &nbsp <?php echo $newMessage['newm'] ?></a>
                            <a class="dropdown-item" href="ajax.php?action=logout" <?php echo $_SESSION['login_name'] ?>>Log Out</a>
                        </div>
                    </div>
                </div>

</nav>