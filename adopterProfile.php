<?php
//session_start();
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
    <link rel="stylesheet" type="text/css" href="css/adopterProfile.css">


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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    $username
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                    <a class="dropdown-item" href="#whatWeDodiv">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#HowItWorks">Browse Pets</a>
                    <a class="dropdown-item" href="#HowItWorks">Saved Pets</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Log out</a>
                </div>
            </li>
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
                    <span id="savedPetsIcon" style="color: rgb(201, 13, 13);" class="icon-holder">
                      <i class="fas fa-heart"></i>
                    </span>
                    <span class="title">Saved Pets</span>
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
        <!-- Team member -->
        <div class="search-res col-xs-12 col-sm-12 col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="frontside">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="img/brown-cat.jpg" alt="card image"></p>
                        <h4 class="pet-name card-title">Mushi</h4>
                        <p class="pet-descr card-text">mushi is an energetic, fun playful cat that just wants someone to hold her</p>

                        <div class="pet-info-tags clearfix">
                            <span class="badge badge-pill badge-info">#cat</span>
                            <span class="badge badge-pill badge-success">#brown</span>
                            <span class="badge badge-pill badge-danger">#white</span>
                            <span class="badge badge-pill badge-success">#2yrs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Team member -->
        <!-- Team member -->
        <div class="search-res col-xs-12 col-sm-12 col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="frontside">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="img/brown-cat.jpg" alt="card image"></p>
                        <h4 class="pet-name card-title">Mushi</h4>
                        <p class="pet-descr card-text">mushi is an energetic, fun playful cat that just wants someone to hold her</p>

                        <div class="pet-info-tags clearfix">
                            <span class="badge badge-pill badge-info">#cat</span>
                            <span class="badge badge-pill badge-success">#brown</span>
                            <span class="badge badge-pill badge-danger">#white</span>
                            <span class="badge badge-pill badge-success">#2yrs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Team member -->
        <!-- Team member -->
        <div class="search-res col-xs-12 col-sm-12 col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="frontside">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="img/brown-cat.jpg" alt="card image"></p>
                        <h4 class="pet-name card-title">Mushi</h4>
                        <p class="pet-descr card-text">mushi is an energetic, fun playful cat that just wants someone to hold her</p>

                        <div class="pet-info-tags clearfix">
                            <span class="badge badge-pill badge-info">#cat</span>
                            <span class="badge badge-pill badge-success">#brown</span>
                            <span class="badge badge-pill badge-danger">#white</span>
                            <span class="badge badge-pill badge-success">#2yrs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Team member -->
        <!-- Team member -->
        <div class="search-res col-xs-12 col-sm-12 col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="frontside">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="img/brown-cat.jpg" alt="card image"></p>
                        <h4 class="pet-name card-title">Mushi</h4>
                        <p class="pet-descr card-text">mushi is an energetic, fun playful cat that just wants someone to hold her</p>

                        <div class="pet-info-tags clearfix">
                            <span class="badge badge-pill badge-info">#cat</span>
                            <span class="badge badge-pill badge-success">#brown</span>
                            <span class="badge badge-pill badge-danger">#white</span>
                            <span class="badge badge-pill badge-success">#2yrs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Team member -->
        <!-- Team member -->
        <div class="search-res col-xs-12 col-sm-12 col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="frontside">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="img/brown-cat.jpg" alt="card image"></p>
                        <h4 class="pet-name card-title">Mushi</h4>
                        <p class="pet-descr card-text">mushi is an energetic, fun playful cat that just wants someone to hold her</p>

                        <div class="pet-info-tags clearfix">
                            <span class="badge badge-pill badge-info">#cat</span>
                            <span class="badge badge-pill badge-success">#brown</span>
                            <span class="badge badge-pill badge-danger">#white</span>
                            <span class="badge badge-pill badge-success">#2yrs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Team member -->
        <!-- Team member -->
        <div class="search-res col-xs-12 col-sm-12 col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="frontside">
                <div class="card">
                    <div class="card-body text-center">
                        <p><img class=" img-fluid" src="img/brown-cat.jpg" alt="card image"></p>
                        <h4 class="pet-name card-title">Mushi</h4>
                        <p class="pet-descr card-text">mushi is an energetic, fun playful cat that just wants someone to hold her</p>

                        <div class="pet-info-tags clearfix">
                            <span class="badge badge-pill badge-info">#cat</span>
                            <span class="badge badge-pill badge-success">#brown</span>
                            <span class="badge badge-pill badge-danger">#white</span>
                            <span class="badge badge-pill badge-success">#2yrs</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ./Team member -->
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
                Hi #userName
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
            #userFullName
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

</body>
</html>
