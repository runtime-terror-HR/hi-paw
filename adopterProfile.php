<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hi Paw</title>
    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />
    <link rel="stylesheet" href="css/nav_css.css">
    <script>
        import 'bootstrap/dist/js/bootstrap.bundle';
    </script>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link href="css/userProfileInfo.css" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="icon" type="image/png" href="img/HiPawblack.png"/>

</head>
<style>
    .list-group-item:hover{
        color: #cf3d3b;
    }
    .footprints{
        background: transparent;

    }
</style>
<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><a class="navbar-brand" href="home.php">
                <img src="img/HiPaw black.png" width="45" height="45" class="d-inline-block align-top" alt="">
                <div style="color: #0a0a0a; font-size: 30px; margin-top: 12px" class="superFont d-inline-block"> Hi Paw!</div>
            </a></div>
        <div class="list-group list-group-flush">
            <a style="background-color: #e2e2e2 !important;" href="adopterProfile.php" data-toggle="prof_toggle" class="list-group-item list-group-item-action bg-light"><span> <i style=" margin-right: 15px;" class="fas fa-user"></i>
                </span>
                <span class="title" > My Profile</span></a>
            <?php
            if($_SESSION['user-table']=='adopter'){
                echo " <a href=\"savedPets.php\" class=\"list-group-item list-group-item-action bg-light\"><i style=\" margin-right: 15px;\" class=\"fas fa-heart\"></i>Saved Pets</a>";
            }
            else {
                echo " <a href=\"profile_mypets.php\" class=\"list-group-item list-group-item-action bg-light\"><i style=\" margin-right: 15px;\" class=\"fas fa-paw\"></i>My Pets</a>";
      echo "<a href=\"request_m.php\" class=\"list-group-item list-group-item-action bg-light\"><span id=\"chatIcon\" class=\"icon-holder\">
                      <i style=\" margin-right: 15px;\" class=\"fas fa-comments\"></i>
                    </span><span class=\"title\">Requests</span></a>";
            }
            ?>


            <a href="logout.php" class="list-group-item list-group-item-action bg-light"><i style=" margin-right: 15px;" class="fas fa-sign-out-alt"></i>
                <span class="title">Sign out</span></a>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <img src="img/testbg.png" style="position: absolute; bottom: 10px; right: 30px" alt="">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #f0f0f0;">
            <button class="btn btn-white" style="background: transparent" id="menu-toggle"><span class="navbar-toggler-icon"></button>


            <button id="toggleButton" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapse_target">
                <ul class="nav navbar-nav ml-auto" >
                    <li class="navbar-item active">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <a class="dropdown-item" href="home.php#whatWeDodiv">What We Do</a>
                            <a class="dropdown-item" href="home.php#HowItWorks">How It Works</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">People Are Saying</a>
                        </div>
                    </li>
                    <?php
                    if(isset($_SESSION['user-id'])){
                        $db = new mysqli("localhost", "root", "", "hipaw");
                        if($db->errno){
                            echo "error connecting to the database";
                            exit;
                        }
                        $stmt = $db->prepare("SELECT name FROM ".$_SESSION['user-table']." WHERE id = ?");
                        $stmt->bind_param("s",  $_SESSION['user-id']);
                        $stmt->execute();
//fetching result would go here, but will be covered later
                        $stmt->store_result();
                        if($stmt->num_rows !== 0) {
                            $stmt->bind_result($username);
                            $stmt->fetch();
                            $stmt->close();
                        }
                        else {
                            exit('error invalid user id ');
                        }
                        if($_SESSION['user-table'] == 'adopter'){
                            echo " <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown2\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  ".$username."
              </a>
              <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown2\">
                  <a class=\"dropdown-item\" href=\"adopterProfile.php\">Profile</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">Browse Pets</a>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">Saved Pets</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"logout.php\">Log out</a>
              </div>
          </li>";
                        }
                        elseif ($_SESSION['user-table'] == 'guardian') {
                            echo " <li class=\"nav-item dropdown\">
              <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown3\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                  ".$username."
              </a>
              <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown3\">
                  <a class=\"dropdown-item\" href=\"adopterProfile.php\">Profile</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"profile_mypets.php\">View Own Pets</a>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">Requests</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"logout.php\">Log out</a>
              </div>
          </li>";
                        }
                    }
                    else{
                        echo " <li class=\"navbar-item\">
              <a class=\"nav-link\" href=\"sign-up.php?q=adopter\">Adopt</a>
          </li>
          <li class=\"navbar-item\">
              <a class=\"nav-link\" href=\"sign-up.php?q=guardian\">Rehome</a>
          </li>
        <li class=\"navbar-item\">
          <a class=\"nav-link\" href=\"log-in.php\" style=\"margin-right: 2px; padding-right: 0\">Log in </a>
        </li>
        <li class=\"navbar-item\">
          <a class=\"nav-link\" href=\"sign-up.php\" style=\"margin-left: 1px; padding-left: 0\">| Sign up</a>
        </li>";
                    }
                    ?>


                    <li class="navbar-item">
                        <a class="nav-link" href="home.php#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php
        $db = new mysqli("localhost", "root", "", "hipaw");
        if($db->errno){
            echo "error connecting to the database";
            exit;
        }
        $stmt ="SELECT * FROM ".$_SESSION['user-table']." WHERE id=".$_SESSION['user-id'];
        $result = mysqli_query($db, $stmt);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $userName=$row["name"];
            $userEmail=$row["email"];
            $userNum=$row["number"];
            $userCity=$row["city"];
        }
        ?>
        <div class="container-fluid" style="margin-left: 20px;">

            <div class="row text-center" style="text-align: center;">
                <div class="col-xs-6">
                    <div class="userImg ">
                        <img src="img/default-user-profile-image-png-2.png" width="100%">
                    </div>
                </div>
                <div class="col-xs-6 align-self-center">
                    <div class="userName superFont">
                        Hi <?php  echo $username;    ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="container infoCard">
                    <div>
                        <br>
                        <label>Name</label>
                        <span class="viewEditIcon">
          <div class="superFont">
            <?php  echo $username;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
        </span>
                        <hr>
                        <span class="viewEditIcon">
          <label>Email</label>
          <div class="superFont">
            <?php  echo $userEmail;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
        </span>
                        <hr>
                        <span class="viewEditIcon">
          <label>Number</label>
          <div class="superFont">
            <?php  echo $userNum;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div> </div>
                    <hr>
                    <span class="viewEditIcon">
          <label>City</label>
          <div class="superFont">
            <?php  echo $userCity;    ?>
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
          <br>
        </span>

                </div>
            </div>

        </div>
        <!--end profile info-->
        <br><br><br><br><br>


    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>