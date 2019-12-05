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

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/nav_css.css">
    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="css/searchPagecss.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
</head>
<style>

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

            <a href="profile_mypets.php" style="background-color: #c4c4c4 !important; " class="list-group-item list-group-item-action bg-light"><i style=" margin-right: 15px;" class="fas fa-paw"></i>My Pets</a>


            <a href="#" class="list-group-item list-group-item-action bg-light"><span id="chatIcon" class="icon-holder">
                      <i style=" margin-right: 15px;" class="fas fa-comments"></i>
                    </span><span class="title">Requests</span></a>

            <a href="logout.php" class="list-group-item list-group-item-action bg-light"><i style=" margin-right: 15px;" class="fas fa-sign-out-alt"></i>
                <span class="title">Sign out</span></a>

        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper" style="background-color: white;">

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
$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}

$ids_array = array();
$stmt = $db->prepare("SELECT id FROM pet WHERE owner = ?");
$stmt->bind_param("i", $_SESSION['user-id']);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows === 0){

}
else {
    $ids = array();
    $stmt->bind_result($idRow);
    while ($stmt->fetch()) {
        $ids[] = $idRow;
    }
    $stmt->close();
    foreach ($ids as $petid){
        $stmt = $db->prepare("SELECT type, name, age_years, age_months, photo, story FROM pet WHERE id = ?");
        $stmt->bind_param("i", $petid);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows === 0){
            $stmt->close();
            exit("error selecting");
        }
        if($stmt->num_rows !== 0) {
            $stmt->bind_result($type,$name, $agey, $agem,$photo, $story);
            $stmt->fetch();
            $stmt->close();
        }


        $pet_is = "";
        $stmt = $db->prepare("SELECT petis FROM pet_is WHERE pet_id = ?");
        $stmt->bind_param("i", $petid);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows !== 0){
            $pet_is = $name." is ";
            $stmt->bind_result($idRow);
            while($stmt->fetch()) {
                $pet_is = $pet_is.", ".$idRow;
            }
            $pet_is = $pet_is." ".$type.".";
        }
        $stmt->close();
        $pet_color = "#";
        $stmt = $db->prepare("SELECT color FROM pet_color WHERE pet_id = ?");
        $stmt->bind_param("i", $petid);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows !== 0){
            $stmt->bind_result($colorRow);
            while($stmt->fetch()) {
                $pet_color = $pet_color.",".$colorRow;
            }
        }
        $stmt->close();
        $type = "#".$type;
        if( $agey == 0)
            $age = "#".$agem."mon";
        else $age = "#".$agey."yrs";


        echo " <div class=\"search-res col-xs-12 col-sm-6 col-md-4\" data-aos=\"fade-up\">
    <div class=\"image-flip\" ontouchstart=\"this.classList.toggle('hover');\" >
        <div class=\"mainflip\" >
            <div class=\"frontside\" >
                <div class=\"card\" >
                    <div class=\"card-body text-center\">
                        <p><img class=\" img-fluid\" src=\"".$photo."\" alt=\"card image\"></p>
                        <h4 class=\"pet-name card-title\">".$name."</h4>
                        <p class=\"pet-descr card-text\">".$pet_is."</p>
                        <div class=\"pet-info-tags clearfix\">
                            <span class=\"badge badge-pill badge-info\">".$type."</span>
                            <span class=\"badge badge-pill badge-danger\">".$pet_color."</span>
                            <span class=\"badge badge-pill badge-success\">".$age."</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"backside\" >
                <div class=\"card\" >
                    <div class=\"card-body text-center mt-4\">
                        <h4 class=\"card-title\">Story</h4>
                        <p class=\"card-text\">".$story."</p>
                        <p class=\"heart\"></p>
                        <button type=\"button\" onclick=\"window.location.href='petProfile.php?pet_id=".$petid."'\" class=\"btn btn-primary\">View Profile <i class=\"fas fa-paw\"></i> </button>
                        <button type=\"button\" onclick=\"window.location.href='petProfile.php?pet_id=".$petid."'\" class=\"btn btn-primary\">Edit Profile</button>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
";
    }

    echo " <div class=\"search-res col-xs-12 col-sm-6 col-md-4\" data-aos=\"fade-up\">
    <div class=\"image-flip\" >
        
            
                    <div style='text-align: center' class=\"card-body text-center\">
                    <h2 style='margin-bottom: 30px'> Add new Pet.</h2>
                        <a style='color: #0a0a0a' href='creatPetProfile.php'> <i style='font-size: 100px' class=\"far fa-plus-square\"></i> </a>
                        </div>
                    
           
        </div>
    </div>
";

}
?>
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
