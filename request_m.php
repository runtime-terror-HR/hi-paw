<?php
session_start();
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}
$stmt = $db->prepare("SELECT id, pet_id, adopter_id FROM request WHERE guardian_id = ?");
$stmt->bind_param("i",  $_SESSION['user-id']);
$stmt->execute();
//fetching result would go here, but will be covered later
$stmt->store_result();
if($stmt->num_rows !== 0) {
    $requestid = array();
    $petids = array();
    $petnames = array();
    $petphoto = array();
    $adoptername = array();
    $adopter = array();
    $stmt->bind_result($idrow, $idp,$idad);
    while($stmt->fetch()) {
        $requestid[] = $idrow;
        $petids[] = $idp;
        $adopter[] = $idad;
    }
    $stmt->close();
    for( $i = 0;$i< count($petids); $i++) {
        $stmt = $db->prepare("SELECT name, photo FROM pet WHERE id = ?");
        $stmt->bind_param("i", $petids[$i]);
        $stmt->execute();
//fetching result would go here, but will be covered later
        $stmt->store_result();
        if ($stmt->num_rows !== 0) {
            $stmt->bind_result($petnames[$i], $petphoto[$i]);
            $stmt->fetch();
            $stmt->close();
        } else {
            exit('error invalid user id ');
        }

        $stmt = $db->prepare("SELECT name FROM adopter WHERE id = ?");
        $stmt->bind_param("i", $adopter[$i]);
        $stmt->execute();
//fetching result would go here, but will be covered later
        $stmt->store_result();
        if ($stmt->num_rows !== 0) {
            $stmt->bind_result($adoptername);
            $stmt->fetch();
            $stmt->close();
        } else {
            exit('error invalid user id ');
        }

    }
}
else {
    $nodata = '1';
}




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
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nav_css.css">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/searchPagecss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
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
            <a href="adopterProfile.php" data-toggle="prof_toggle" class="list-group-item list-group-item-action bg-light"><span> <i style=" margin-right: 15px;" class="fas fa-user"></i>
                </span>
                <span class="title" > My Profile</span></a>

            <a href="profile_mypets.php" class="list-group-item list-group-item-action bg-light"><i style=" margin-right: 15px;" class="fas fa-paw"></i>My Pets</a>


            <a href="request_m.php" style="background-color: #e2e2e2 !important; "  class="list-group-item list-group-item-action bg-light"><span id="chatIcon" class="icon-holder">
                      <i style=" margin-right: 15px;" class="fas fa-comments"></i>
                    </span><span class="title">Requests</span></a>

            <a href="logout.php" class="list-group-item list-group-item-action bg-light"><i style=" margin-right: 15px;" class="fas fa-sign-out-alt"></i>
                <span class="title">Sign out</span></a>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="background-color: white; ">
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
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About Us
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                  <a class=\"dropdown-item\" href=\"#whatWeDodiv\">Profile</a>
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
                  <a class=\"dropdown-item\" href=\"#whatWeDodiv\">Profile</a>
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item\" href=\"#HowItWorks\">View Own Pets</a>
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

        <div class="container-fluid" style=" padding-top: 20px;">
            <div class="footprints container" style="padding: 40px;">
                <div class="row">
<?php
if(!isset($nodata)) {
    for ($i = 0; $i < count($petids); $i++) {

        echo " <div class=\"card\" style=\"width:400px\">
                <img class=\"card-img-top\" src=\"" . $petphoto[$i] . "\" alt=\"Card image\" style=\"width:100%\">
                <div class=\"card-body\">
                    <h4 class=\"card-title\">" . $adoptername . "</h4>
                    <p class=\"card-text\">has sent you an email to adopt " . $petnames[$i] . "</p>
                    <a href=\"delete_request.php?request=" . $requestid[$i] . "\" style='width: 100%' class=\"btn btn-primary\">Delete</a>
                </div>
            </div>";

    }
}




?>
                </div>
            </div>



        </div>
    </div>
</div>
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
