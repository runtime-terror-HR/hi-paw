<?php
session_start();

$_SESSION['user-id']=20;
$_SESSION['user-table'] = "adopter";   //"guardian";  //"adopter";


//$_SESSION['adopterUserId']= $_SESSION['user-id'];   //20
//$_SESSION['guardianUserId']= $_SESSION['user-id']; //3
//$username  ..... from login
if(isset($_SESSION['user-id'])){
    $db = new mysqli("localhost", "root", "", "hipaw");
    if($db->errno){
        echo "error connecting to the database";
        exit;
    }
    $stmt = $db->prepare("SELECT name FROM ".$_SESSION['user-table']." WHERE id = ".$_SESSION['user-id'].";");
    $stmt->bind_param( $_SESSION['user-id']);
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
        $_SESSION['adopterUserId']= $_SESSION['user-id'];
        unset($_SESSION['guardianUserId']);
    }
    elseif ($_SESSION['user-table'] == 'guardian') {
        $_SESSION['guardianUserId']= $_SESSION['user-id'];
        unset($_SESSION['adopterUserId']);
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- for aos  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- for font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- <script src="https://use.fontawesome.com/releases/v5.8.1/js/all.js"></script> -->


    <title>Hi Paw</title>
    <link rel="icon" type="image/png" href="img/HiPaw black.png"/>

    <!--    <link rel="stylesheet" type="text/css" href="css/nav_css.css">-->
    <link rel="stylesheet" type="text/css" href="css/searchPagecss.css">
    <link rel="stylesheet" type="text/css" href="css/profileStyle.css">
<!--    <link rel="stylesheet" type="text/css" href="css/adopterProfile.css">-->

    <style>
        .superFont{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        nav.navbar>a>div.superFont {
            margin-left: 55px;  margin-top: -40px; font-size: 30px; color: rgb(31, 30, 30);
        }

        .navbar {
            padding: 2px 1rem !important;
        }

        ul.nav a {
            font-size: 16px !important;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }


        .savedPetsDemo {
            display: block;
            width: 90%;
            position: relative;
            top: 80px;
            left: 90px;
            padding-right: 40px;
        }
        .sidebar {
            visibility: visible !important;
        }

        .sidebar-menu .scrollable .pos-r .ps .ps--active-y {
            visibility: visible !important;
        }

        .sidebar-inner li.nav-item:hover, .sidebar-inner li.nav-item > a.sidebar-link:hover {
            color: black !important;
        }

        /* user info demo  */
        .profileInfoDemo {
            display: none;
            width: 100%;
            position: relative;
            top: 80px;
            left: 90px;
            padding-right: 40px;
        }


        .userImg {
            border-radius: 10px;
            border: 1px solid lightgray;
            width: 150px;
            height: 150px;
            overflow: hidden;
        }
        .col-xs-6 {
            padding: 10px;
        }

        .userName {
            font-size: 40px;
        }

        .infoCard {
            width: 800px;
            margin-left: 8px;
            border-radius: 20px;
            border: 1px solid lightgray;
            /* filter: drop-shadow(2px 3px 6px rgba(0, 0, 0, 0.631)); */
        }
        .infoCard div.superFont {
            padding-left: 150px;
            margin-right: 20px;
            margin-top: -30px;
            margin-bottom: 10px;
            width: 500px;
        }

        .infoCard label {
            width: 40px;
            padding-left: 20px;
        }

        .edit {
            position: relative !important;
            display: block;
            color: #72777a;
            font-size: 15px;
            margin-left: 500px;
            margin-top: -30px !important;
            width: 100px;
            visibility: hidden;
        }

        .viewEditIcon:hover .edit {
            visibility: visible;
        }

        /* overlay  */
        .title{
            color: #1a1a1a;
            text-align: center;
            margin-bottom: 10px;
        }

        .content {
            position: relative;
            width: 100%;
            max-width: 200px;
            margin: auto;
            overflow: hidden;
        }

        .content .content-overlay {
            border-radius: 200px;
            background: rgba(0, 0, 0, 0.479);
            position: absolute;
            height: 100%;
            width: 200px;
            /* left: 0;
            top: 0;
            bottom: 0;
            right: 0; */
            opacity: 0;
            -webkit-transition: all 0.4s ease-in-out 0s;
            -moz-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .content:hover .content-overlay{
            opacity: 1;
        }

        .content-image{
            width: 100%;
        }

        .content-details {
            position: absolute;
            text-align: center;
            padding-left: 1em;
            padding-right: 1em;
            width: 200px;
            top: 50%;
            left: 100px;
            opacity: 0;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            -webkit-transition: all 0.3s ease-in-out 0s;
            -moz-transition: all 0.3s ease-in-out 0s;
            transition: all 0.3s ease-in-out 0s;
        }


        .content:hover .content-details{
            top: 50%;
            left: 50%;
            opacity: 1;
        }

        .content-details h3{
            color: #fff;
            font-weight: 500;
            letter-spacing: 0.15em;
            margin-bottom: 0.5em;
            text-transform: uppercase;
        }

        .content-details p{
            color: #fff;
            font-size: 0.8em;
        }

        .fadeIn-bottom{
            top: 80%;
        }

        .card:hover .removeFromSavedIcon{
            visibility: visible;
        }

        .removeFromSavedIcon {
            visibility: hidden;
        }

        .removeFromSavedIcon a{
            color: #72777a;
        }
        .removeFromSavedIcon :hover, .removeFromSavedIcon a:hover{
            color: red;
        }



    </style>

    <script>
        function viewProfileInfo() {
            document.getElementById('savedPetsDemo').style.display="none";
            document.getElementById('profileInfoDemo').style.display="block";
            document.getElementById('savedPetsIcon').style.color="";
            document.getElementById('profileIcon').style.color="#8c45c7";
            document.getElementById('chatIcon').style.color="";
        }
        function viewSavedPets() {
            document.getElementById('savedPetsDemo').style.display="block";
            document.getElementById('profileInfoDemo').style.display="none";
            document.getElementById('savedPetsIcon').style.color="#c90d0d";
            document.getElementById('profileIcon').style.color="";
            document.getElementById('chatIcon').style.color="";
        }
        function viewChat() {
            document.getElementById('savedPetsDemo').style.display="none";
            document.getElementById('profileInfoDemo').style.display="none";
            document.getElementById('savedPetsIcon').style.color="";
            document.getElementById('profileIcon').style.color="";
            document.getElementById('chatIcon').style.color="#37ac51";
        }
        
        function removeFromSaved(name) {
            var r = confirm("Un-save "+name+"!!");
            print("hi");
            if (r == true) {
                <?php
                echo"<h1style='margin-left:200px;margin-top:200px;'>Hi</h1>";

                $deleteId=-1;

                $data = ''; // your HTML data from the question
                preg_match( '/<div class="\st\">(.*?)<\/div>/', $data, $match );

                $dom = new DOMDocument;
                $dom -> loadHTML( $data );
                $divs = $dom -> getElementsByTagName('div');

                foreach ( $divs as $div ) {
                    if ($div->hasAttribute('class') && strpos($div->getAttribute('class'), 'st') !== false) {
                        $deleteId = $div->nodeValue;
                    }
                }

                echo $deleteId;
                $db = new mysqli("localhost", "root", "", "hipaw");
                if ($db->errno) {
                    echo "error connecting to the database";
                    exit;
                }

                $stmt = "DELETE FROM saved_pets WHERE adopter_id=".$_SESSION['user-id']." AND pet_id=". $deleteId."";

                ?>
            }
            return false;
        }
    </script>

</head>
<body>
<!--navbar-->
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #f0f0f0;">
    <a class="navbar-brand" href="home.html">
        <img src="img/HiPaw black.png" width="45" height="45" class="d-inline-block align-top" alt="">
        <div class="superFont"> Hi Paw!</div>
    </a>
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
            if(isset($_SESSION['adopterUserId'])){
                echo "<li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown2\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    ".$username."
                </a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown2\">
                    <a class=\"dropdown-item\" onclick=\"viewProfileInfo()\">Profile</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"searchPage.php\">Browse Pets</a>
                    <a class=\"dropdown-item\" onclick=\"viewSavedPets()\">Saved Pets</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"logout.php\">Log out</a>
                </div>
            </li>";
            }
            elseif (isset($_SESSION['guardianUserId'])) {
                echo "<li class=\"nav-item dropdown\">
                <a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdown2\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    " . $username . "
                </a>
                <div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown2\">
                    <a class=\"dropdown-item\" onclick=\"viewProfileInfo()\">Profile</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"#\">Requests</a>
                    <a class=\"dropdown-item\" onclick=\"viewSavedPets()\">View Own Pets</a>
                    <div class=\"dropdown-divider\"></div>
                    <a class=\"dropdown-item\" href=\"logout.php\">Log out</a>
                </div>
            </li>";
            }
            ?>

            <li class="navbar-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>


<!--side-bar-->

<div class="peer">
    <div class="mobile-toggle sidebar-toggle">
        <a href="" class="td-n">
            <i class="ti-arrow-circle-left"></i>
        </a>
    </div>
</div>
<div class="sidebar">
    <div class="sidebar-inner">
        <br><br><br>
        <ul class="sidebar-menu scrollable pos-r ps ps--active-y">
            <li class="nav-item mT-30 active">
                <a class="sidebar-link" onclick="viewProfileInfo()">
                    <span id="profileIcon" class="icon-holder">
                      <i class="fas fa-user"></i>
                    </span>
                    <span class="title">My Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" onclick="viewSavedPets()">
                    <?php
                    if(isset($_SESSION['adopterUserId'])){
                        echo "<span id=\"savedPetsIcon\" style=\"color: #c90d0d;\" class=\"icon-holder\">
                      <i class=\"fas fa-heart\"></i>
                    </span>
                    <span class=\"title\">Saved Pets</span>";
                    }
                    elseif (isset($_SESSION['guardianUserId'])){
                        echo "<span id=\"savedPetsIcon\" style=\"color: #c90d0d;\" class=\"icon-holder\">
                      <i class=\"fas fa-paw\"></i>
                    </span>
                    <span class=\"title\">My Pets</span>";
                    }
                    ?>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" onclick="viewChat()">
                    <span id="chatIcon" class="icon-holder">
                      <i class="fas fa-comments"></i>
                    </span><span class="title">Chat</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="sidebar-link" href="home.php">
                    <span class="icon-holder">
                        <i class="fas fa-sign-out-alt"></i>
                    </span>
                    <span class="title">Sign out</span>
                </a>
            </li>

        </ul>
    </div>
</div>
<!--end side-bar-->

<!--saved pets-->
<div id="savedPetsDemo" class="savedPetsDemo">
    <div class="row">

        <?php


        $db = new mysqli("localhost", "root", "", "hipaw");
        if ($db->errno) {
            echo "error connecting to the database";
            exit;
        }
        $q = "SELECT * FROM saved_pets WHERE adopter_id=".$_SESSION['user-id']." ";
        $res = $db->query($q);
        if(!$res){
            $_SESSION['no_pets']='true';
            echo "<h4>No Saved Pets</h4>";
            exit();
        }
        $ids = array();
        while ($row = $res->fetch_array())
        {
//            echo $row['id'];
            $ids[] = $row['id'];
        }

        $_SESSION['pet_ids_array'] = $ids;
//        ..............
    if(isset($_SESSION['pet_ids_array'])) {
        if(!isset($_SESSION['no_pets'])) {

        $id_arr = [];
        $id_arr = $_SESSION['pet_ids_array'];
        foreach ($id_arr as $petid) {
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

            echo "
            <div class=\"search-res col-xs-12 col-sm-12 col-md-6 col-lg-4 aos-init aos-animate\" data-aos=\"fade-up\">
            <div class=\"frontside\">
                <div class=\"card\">
                    <span class=\"removeFromSavedIcon\" style=\"text-align: end;\">
                    <div id='deleteId' style='display: none'>".$petid."</div>
                    ";
            ?>
                    <button style="background: white!important; border: 0px " onclick="alert("Hi)">
                    <i style="color: rgb(114, 118, 121);" class="fas fa-times"></i>
                     unsave &nbsp;
                     </button>
                     </span>
        <?php
                  echo " <div class=\"card-body text-center\" style=\"text-align: center;\">
                        <div class=\"content\">
                            <a onclick=\"window.location.href='process.php?pet_id=".$petid."'\" target=\"_blank\">
                                <div class=\"content-overlay\" style=\"text-align: center;\"></div>
                                <img class=\"content-image\" src=\".$photo.\">
                                <div class=\"content-details fadeIn-bottom\"  style=\"text-align: center;\">
                                    <h3 class=\"content-title\">View Profile</h3>
                                    <i style=\"color: white; font-size: 20px;\" class=\"fas fa-external-link-alt\"></i>
                                </div>
                            </a>
                        </div>
                        <h4 class=\"pet-name card-title\">.$name.</h4>
                        <p class=\"pet-descr card-text\">.$pet_is.</p>

                        <div class=\"pet-info-tags clearfix\">
                            <span class=\"badge badge-pill badge-info\">.$type.</span>
                            <span class=\"badge badge-pill badge-danger\">.$pet_color.</span>
                            <span class=\"badge badge-pill badge-success\">.$age.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            ";


        }
    }
}
?>

    </div>
</div>
<!--end saved pets-->

<!--profile info-->
<div id="profileInfoDemo" class="profileInfoDemo">
    <div class="row text-center" style="text-align: center;">
        <div class="col-xs-6">
            <div class="userImg">
                <img src="img/default-user-profile-image-png-2.png" width="100%">
            </div>
        </div>
        <div class="col-xs-6 align-self-center">
            <div class="userName superFont">
                Hi <?php  echo $username ?>
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
              <?php  echo $username ?>
              <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
                </div>
                </span>
                <hr>
                <span class="viewEditIcon">
          <label>Email</label>
          <div class="superFont">
            #userEmail
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
        </span>
                <hr>
                <span class="viewEditIcon">
          <label>number</label>
          <div class="superFont">
            #userNum
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
        </span>
                <hr>
                <span class="viewEditIcon">
          <label>City</label>
          <div class="superFont">
            #userEmail
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
        </span>
            <hr>
            <span class="viewEditIcon">
          <label>Password</label>
          <div class="superFont">
            #userPass
            <a href="#" class="edit"><i class="fas fa-pencil-alt"></i></a>
          </div>
          <br>
        </span>
            </div>
        </div>
    </div>

</div>
<!--end profile info-->
<br><br><br><br><br>




<br><br><br><br><br>
<br><br><br><br><br>

</body>
</html>

