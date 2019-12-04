<?php
session_start();

$_SESSION['PetId'] = 1;   //comes from another page.

$PetId = $_SESSION['PetId'];
//$petName= $ownerName=$type=$gender=$size=$years=$months="";


$db = new mysqli("localhost", "root", "", "hipaw");
if($db->errno){
    echo "error connecting to the database";
    exit;
}

$stmt ="SELECT pet.*, pet_color.*, pet_goodwith.*, pet_is.*, pet_likes.* FROM pet 
LEFT JOIN pet_color ON pet_color.pet_id = pet.id LEFT JOIN pet_goodwith ON pet_goodwith.pet_id = pet.id LEFT JOIN pet_is ON pet_is.pet_id = pet.id LEFT JOIN pet_likes ON pet_likes.pet_id = pet.id 
WHERE pet.id=".$PetId;
//$stmt->bind_param("ssiisssssssss", $petn, $type, $agey, $agem, $gender, $size, $food, $_SESSION['user-id'], $story, $medical_des, $additional, $_SESSION['city'], $alone);
//$stmt->execute();
$result = mysqli_query($db, $stmt);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_array($result);
    $petName=$row["name"];
    $type=$row["type"];
    $gender=$row["gender"];
    $size=$row["size"];
    $age_years=$row["age_years"];
    $age_months=$row["age_months"];
    $story=$row["story"];
    $health=$row["health"];
    $details=$row["details"];
    $photo=$row["photo"];
    $city=$row["city"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=10">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hi Paw</title>

    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />
  <script src="https://www.googletagservices.com/activeview/js/current/osd.js?cb=%2Fr20100101"></script>
  <script src="https://cdn.ampproject.org/rtv/011911070201440/amp4ads-host-v0.js"></script>
  <script type="text/javascript" async="" src="//static.criteo.net/js/ld/publishertag.prebid.js"></script>
  <script src="https://getyourpet.com/dist_1.1.82.2019110802/gyp.layout.lib.min.js" type="text/javascript"></script>

  <link rel="stylesheet" href="css/petProfile.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">

  <link rel="stylesheet" href="https://getyourpet.com/_assets_1.1.82.2019110802/css/style.css">
  <link rel="stylesheet" href="https://getyourpet.com/dist_1.1.82.2019110802/gyp.layout.app.min.css">
  <link rel="stylesheet" href="https://getyourpet.com/dist_1.1.82.2019110802/gyp.layout.lib.min.css">
  <link rel="stylesheet" href="/dist_1.1.82.2019110802/gyp.spa.lib.min.css">

  <link rel="icon" type="image/png" href="img/HiPawblack.png"/>
<!--    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">-->
<!---->
<!--    <link rel="shortcut icon" href="http://localhost/hi-paw/favicon.ico" />-->

  <script>
      function scrollToTop() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
      }

      function addToSavedButton() {
          //   TODO
          // check if the user is signed in..
          x = document.getElementById("addToSavedButton").innerText;
          if(x.localeCompare("Add to Saved")==0){
              document.getElementById("addToSavedButton").innerHTML = "<svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'><path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' fill='#2D8FD2' fill-rule='evenodd'></path></svg>Unsave";
          }
          else{
              document.getElementById("addToSavedButton").innerHTML = "<svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'><path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' fill='#2D8FD2' fill-rule='evenodd'></path></svg>Add to Saved";
          }
      }

      function connectWithOwner() {
          //   TODO
          // check if the user is signed in..
          document.getElementById("contactMsgBox").style.visibility="visible";

      }

      function hideContactMsgBox() {
          document.getElementById("contactMsgBox").style.visibility="hidden";
      }

  </script>


</head>
<body>
<!--  navbar-->
<nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #f0f0f0; position: fixed;">
    <a class="navbar-brand" href="home.html">
        <img src="img\HiPawblack.png" width="70" height="50" class="d-inline-block align-top" style="padding-left: 20px; margin-top: -10px;">
        <div class="superFont" style="margin-left: 55px;  margin-top: -40px; font-size: 30px; color: rgb(31, 30, 30); padding-left: 20px;"> Hi Paw!</div>
    </a>
    <button id="toggleButton" class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapse_target" style="margin-right: 10px;">
        <ul class="nav navbar-nav ml-auto" >
            <li class="navbar-item">
            <a class="nav-link" href="home.html">Home</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    About Us
</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="home.html#whatWeDo">What We Do</a>
                <a class="dropdown-item" href="home.html#HowItWorks">How It Works</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">People Are Saying</a>
            </div>
            </li>
            <li class="navbar-item active">
            <a class="nav-link" href="#">Adopt</a>
            </li>
            <li class="navbar-item">
            <a class="nav-link" href="#">Rehome</a>
            </li>
            <li class="navbar-item">
            <a class="nav-link" href="#">Login</a>
            </li>
            <li class="navbar-item">
            <a class="nav-link" href="#contact">Contact</a>
            </li>
        </ul>
    </div>
</nav>
<div ng-app="mainApp" class="ng-scope">

    <div id="main-ng-view" class="slide-animation ng-scope" ng-view="" ncg-request-verification-token="CfDJ8HPe7nANJzVCvbp8kNgDhmM-BqXSAgBWDxmBn_7Dyj1B_MPrzyGXz4YtVJwE6jar5_iRjGFwQ-XLlkOlvR6rX_2FK6XzaT2qXHv_GN-pfibg2rbFP86un4rjIVTkdwSFnsx91Acykq1yswD0r01GKsY:CfDJ8HPe7nANJzVCvbp8kNgDhmNaoExp6adc4d6IaH2GL-OHaxqWqCt5qUITHKOsvrIh-vEI3t3PvY2wnhCwM5Sgg8ynopzK-Hz4FaQXPyWmiPy-8LQahgA2i95fev8mZ4sxa_svTbHr_x7WQhwkh1ORD_w" user-id="" is-guardian="false" is-adopter="false" is-vet-user="false" is-vet-admin="false" is-admin="false" web-api-timeout-seconds="30" web-api-video-upload-timeout-seconds="90" viewed-pet-initial-interval-seconds="30" viewed-pet-update-interval-seconds="10" viewed-pet-maximum-seconds-viewed="600" meet-up-details-refresh-interval-seconds="15" send-message-refresh-interval-seconds="60" dashboard-refresh-interval-seconds="60" user-action-retry-interval-miliseconds="250" maximum-number-of-user-action-retry-attempts="50" google-maps-key="AIzaSyBXMWNfAGgzM3T2z5Jkw9DQ1ie1hmUP7wo" guardian-skip-payment="true" community-membership-authorize-only="true" community-membership-skip-payment="true" community-membership-price="35" actual-adoption-prices="0,49,99" public-adoption-prices="0,49,99" pet-promotion-package-prices="0,5,10,20" adoption-skip-payment="false" adoption-skip-payment-offer-valid-through="8/31/2017" search-radius-near-me-in-miles="50" search-radius-not-too-far-from-me-in-miles="250" maximum-photo-file-size-in-megabytes="15" community-spots-near-me-search-radius-in-miles="50">
        <section class="main ng-scope">

            <div class="container-fluid content" ng-swipe-left="nextPet()" ng-swipe-right="previousPet()" ng-swipe-disable-mouse="true">
                <div><br><br><br><br><br><br><br></div>
                <div class="panel animate-slide-down-slide-up" ng-show="petUser &amp;&amp; pet &amp;&amp; petSearchPet">
                    <!-- top part  -->
                    <div class="overview row">
                        <!-- photo & google map col-->
                        <div class="col-md-6">
                            <div class="component slider">
                                <pet-images-carousel pet="pet" petsearchpet="petSearchPet">
                                    <!-- pet Photo  -->
                                    <div class="petPhoto">
                                        <img src="https://i.pinimg.com/originals/99/f9/ed/99f9ede31328c8484e9e252d08811535.jpg">
                                        <!-- <img src="https://www.101dogbreeds.com/wp-content/uploads/2018/10/Labrador-Retriever-Puppies.jpg" alt=""> -->
                                    </div>
                                </pet-images-carousel>
                            </div>
                            <div class="mob-pet-name hidden-md-up no-breed" ng-class="{'no-breed': pet.PetBreeds == null || pet.PetBreeds.length == 0}">
                                <h2 class="pet-name card-title m-t-2 ng-binding"></h2>
                                <br>
                            </div>

                            <div class="map m-t-3 hidden-sm-down m-b-0">
                                <p class="ng-binding">
                                    <img src="https://getyourpet.com/_assets_1.1.82.2019110802/images/icons/pin-blue.svg">
    Approximate Location — <?php echo $city; ?>, Palestine
</p>
                                <div>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193590.0505730405!2d-111.57588450039613!3d40.69942133908762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8752611e94d3725f%3A0x190ec47f3a5436e6!2z2LPZiNmE2Kog2YTYp9mK2YMg2LPZitiq2YrYjCDZitmI2KrYpyA4NDEwOdiMINin2YTZiNmE2KfZitin2Kog2KfZhNmF2KrYrdiv2Kk!5e0!3m2!1sar!2s!4v1574462653797!5m2!1sar!2s" frameborder="0" style="border:0;" width= "100%" height="400px"></iframe>
                                </div>
                            </div>
                        </div>
                        <!-- general Information col-->
                        <div class="col-md-6">
                            <ul class="specs">
                                <li class="ng-binding"><?php echo $type; ?> <span>Pet Type</span></li>
                                <li class="ng-binding"><?php echo $gender; ?> <span>Gender</span></li>
                                <li class="ng-binding"><?php
                                    echo $age_years." yr";
                                if($age_months!=0)
                                    echo ", ".$age_months." mo";

                                    ?>
                                    <span>Age</span></li>
                                <li popover-placement="auto top" class="ng-binding ng-scope"><?php echo $size; ?><span>Size</span></li>
                            </ul>

                            <div class="desk-pet-name hidden-sm-down">
                                <div>
                                    <h2 id="petName" class="pet-name card-title m-t-2 ng-binding">
                                        <?php echo $petName; ?>
                                        <svg ng-show="isAdopter &amp;&amp; userSavedPetId" popover-append-to-body="true" popover-enable="true" uib-popover="Nani is saved to your dashboard" popover-trigger="mouseenter" popover-placement="auto top" width="16" height="14" viewBox="0 0 16 14" xmlns="http://www.w3.org/2000/svg" class="ng-hide"><path d="M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128" fill="#2D8FD2" fill-rule="evenodd"></path></svg>
                                    </h2>
                                    <h5></h5>
                                </div>
                            </div>
                            <!-- story  -->
                            <p class="overflow-hidden ng-binding">
                                <?php echo $story; ?>
                            </p>

                            <div class="main-actions m-y-3 text-md-center">
                                <button id="connect-button" type="button" onclick="connectWithOwner()" class="btn btn-primary btn-lg m-r-1" style="z-index: 1;">
                                    Connect with owner
                                </button>
                                <button type="button" id="addToSavedButton" onclick="addToSavedButton()" class="btn btn-lg btn-info add-to-saved btn-spinner m-r-1 ng-binding" title="Save Pet to your dashboard." style="width: 40%;">
                                        <svg width='16' height='14' viewBox='0 0 16 14' xmlns='http://www.w3.org/2000/svg'><path d='M8 13.978S16 8.16 16 3.85c0-4.095-6.222-5.872-8-.496-1.778-5.376-8-3.6-8 .496 0 4.31 8 10.128 8 10.128' fill='#2D8FD2' fill-rule='evenodd'></path></svg>Add to Saved
                                </button>
                            </div>

                            <img src="img/pngfind.com-white-lines-png-3640.png" class="dashedLine1">
                            <img src="img/paw.png" class="paw1">
                            <div class="component component-tags">
                                <h5 class="m-b-0 ng-binding" >
                                    <?php echo $petName; ?> is located in <?php echo $city; ?>, Palestine.
                                </h5>
                            </div>

                            <div class="component component-tags">
                                <h5 class="m-b-1 ng-binding"><?php echo $petName; ?> is…</h5>
                                <ul class="list-inline">
                                    <li class="list-inline-item tag">Active (lots of energy)</li>
                                    <li class="list-inline-item tag">Sensitive</li>
                                    <li class="list-inline-item tag">Friendly</li>
                                    <li class="list-inline-item tag">Eager to please</li>
                                    <li class="list-inline-item tag">Affectionate</li>
                                    <li class="list-inline-item tag">Playful</li>
                                </ul>
                            </div>

                            <div class="component component-tags">
                                <h5 class="m-b-1 ng-binding"><?php echo $petName; ?> likes…</h5>
                                <ul class="list-inline">
                                    <li class="list-inline-item tag">To be held or carried</li>
                                    <li class="list-inline-item tag">To be brushed</li>
                                    <li class="list-inline-item tag">To fetch</li>
                                    <li class="list-inline-item tag">To be with people</li>
                                    <li class="list-inline-item tag">To be petted</li>
                                    <li class="list-inline-item tag">To ride in the car</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <!-- info cards  -->
                <div class="animate-slide-down-slide-up">
                    <pet-full-profile pet="pet" pet-user="petUser" class="ng-isolate-scope">
                        <div class="row full-profile-row-padding">
                            <div class="col-md-10 col-md-offset-1 col-xs-12">
                                <div class="row full-profile-accordion-panel">
                                    <div class="col-xs-12" id="accordion" role="tablist" aria-multiselectable="true">
                                        <br>
                                        <!-- over card  -->
                                        <div id="overview" class="card accordion-panel">
                                            <div class="card-block accordion-heading" role="tab" id="headingOne">
                                                <h4 class="card-title accordion-title full-profile-title-align">
                                                    <a class="full-profile-title" data-toggle="collapse" target="_self" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        Overview
                                                    </a>
                                                </h4>
                                            </div>
                                            <!-- card data  -->
                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                <div class="accordion-content full-profile-content-text">
                                                    <!-- <div class="divider"></div> -->
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong">Name</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text">
                                                            <span class="ng-binding"><?php echo $petName; ?></span>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="divider"></div> -->
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong ng-binding">Gender</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text ng-binding">
                                                            <?php echo $gender; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong">Age</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text ng-binding">
                                                            <?php
                                                            echo $age_years." yr";
                                                            if($age_months!=0)
                                                                echo ", ".$age_months." mo";
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong ng-binding">Size</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text ng-binding">
                                                            <?php echo $size; ?>
                                                        </div>
                                                    </div>
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-4 col-xs-12 full-profile-strong ng-binding">color</div>
                                                        <div class="col-md-8 col-xs-12 full-profile-text ng-binding">
piage
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>

                                        <div ng-show="pet.OtherDetail" class="card accordion-panel">
                                            <div class="card-block accordion-heading" role="tab" id="headingAdditionalInformation">
                                                <h4 class="card-title accordion-title full-profile-title-align">
                                                    <a class="full-profile-title" data-toggle="collapse" target="_self" data-parent="#accordion" href="#collapseHealth" aria-expanded="true" aria-controls="collapseHealth">
                                                        Health
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseHealth" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAdditionalInformation">
                                                <div class="accordion-content full-profile-content-text">
                                                    <div class="divider"></div>
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-12 full-profile-text ng-binding">
                                                            <?php echo $health; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div ng-show="pet.OtherDetail" class="card accordion-panel">
                                            <div class="card-block accordion-heading" role="tab" id="headingAdditionalInformation">
                                                <h4 class="card-title accordion-title full-profile-title-align">
                                                    <a class="full-profile-title" data-toggle="collapse" target="_self" data-parent="#accordion" href="#collapseAdditionalInformation" aria-expanded="true" aria-controls="collapseAdditionalInformation">
                                                        Additional Information
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseAdditionalInformation" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingAdditionalInformation">
                                                <div class="accordion-content full-profile-content-text">
                                                    <div class="divider"></div>
                                                    <div class="row list-group-item full-profile-group-item">
                                                        <div class="col-md-12 full-profile-text ng-binding">
                                                            <?php echo $details; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>

                                </div>

                            </div>

                        </div>

                    </pet-full-profile>

                </div>
                <br>
            </div>

            <div class="container-fluid container-wrapper no-more-results text-xs-center animate-slide-down-slide-up" ng-show="petUser &amp;&amp; pet &amp;&amp; petSearchPet">
                <a ng-hide="pets.length == 0" onclick="scrollToTop()">Back to top</a>
            </div>

        </section>
    </div>
</div>

<div id="contactMsgBox" modal-render="true" tabindex="-1" role="dialog" class="signIn-signUp-msgBox modal fade ng-isolate-scope in" uib-modal-animation-class="fade" modal-in-class="in" ng-style="{'z-index': 1050 + index*10, display: 'block'}" uib-modal-window="modal-window" index="0" animate="animate" modal-animation="true" style="z-index: 1050; display: block;">
    <div class="modal-dialog ">
        <div class="modal-content" uib-modal-transclude="">
                <a onclick="hideContactMsgBox()" class="text-xs-right" style="text-align: left!important; color: black; margin-left: 7px; margin-top: 10px;"><i class="far fa-times-circle"></i></a>

            <div class="modal-body ng-scope" style="text-align: center;">
                <br>
                <h2>Contact <span id="ownerName">#ownerName</span></h2>
                <br>
                <label style="font-size: 13px;">Want To Adopt <span id="petname"><?php echo $petName; ?></span>? Start Here:</label><br>
                <a class="btn form-button" href="emailForm.html" target="_blank">Send an Adaption Request</a>
                <br><br><hr class="display1">
                <label>Have any further questions for <span id="ownerName">#ownerName</span>?</label><br>
                Email at <a class="sendEmail" href="mailto:whatever@gmail.com?subject=#petName Adaption" id="ownerEmail">whatever@gmail.com</a>
                <br><br>

                <!-- <h2>Want to adopt a pet or put your pet up for adoption?</h2>
                <a class="btn btn-lg btn-primary" ng-href="/Account/Register?acquisitionCode=MPUPD&amp;returnUrl=%2FSearch%23%2Fpet-details%2F129569&amp;returnContext=PetDetails&amp;returnContextInfo=129569" href="/Account/Register?acquisitionCode=MPUPD&amp;returnUrl=%2FSearch%23%2Fpet-details%2F129569&amp;returnContext=PetDetails&amp;returnContextInfo=129569">Register Now</a>
                <h2 class="m-t-3 text-xs-right">Need more info or time to decide?</h2>
                <p class="text-xs-right m-b-3">
                    <a class="btn btn-lg btn-primary" ng-href="/Account/EmailSignUp?acquisitionCode=MPUPD&amp;returnUrl=%2Fpet-profile%2F129569&amp;returnPageName=Nani%E2%80%99s%20Profile" href="/Account/EmailSignUp?acquisitionCode=MPUPD&amp;returnUrl=%2Fpet-profile%2F129569&amp;returnPageName=Nani%E2%80%99s%20Profile">Keep Me Informed</a>
                </p>
                <hr>
                <p class="text-xs-center m-t-3">
                    <a ng-click="confirm()">I'll keep browsing, for now.</a>
                </p> -->
            </div>
        </div>
    </div>
</div>

</body>
</html>