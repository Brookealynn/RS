<?php
session_start();

if (isset($_SESSION['email']))  {
  $email = $_SESSION['email'];
}

if (isset($_SESSION['isRegistered']))  {
    $isReg = $_GET['isRegistered'];
}


if (isset($_GET['logout']))  {
  session_destroy();
  unset($_SESSION['email']);
  header("location: login.php");
}

include('functions.php');


$numStudies = countStudies();

?>

<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Brooke Resendes">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Favicons -->
    <link rel="shortcut icon" href="#">
    <!-- Page Title -->
    <title>Research Stream</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="themify-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome.min.css">
    <!-- Hover Effects -->
    <link href="css/set1.css" rel="stylesheet">
    <!-- Main CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!--============================= HEADER =============================-->
    <div class="nav-menu sticky-top">
        <div class="bg transition">
            <div class="container-fluid fixed">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-lg">
                            <!-- LOGO -->
                            <a class="navbar-brand" href="index.html"><img class="img-fluid" src="assets/images/Research Stream-01.png" height="100px" width="200px" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="ti-menu"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                                <ul class="navbar-nav">
                                    <?php if (isset($_SESSION['email']))  { ?>
                                    <!-- <li class="nav-item">
                                        <a>Hello <?php getName($email) ?>!</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="browse.php?logout=1">Logout</a>
                                    </li>
                                    <?php } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="participantSignup.php">Sign Up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="login.php">Login</a>
                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Log In & Signup -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sign-up" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">SIGN UP</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="login">
                        <div class="modal-header">
                            <h5 class="modal-title"><img src="pls.png" alt="logo"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="ti-close"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control add-listing_form" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control add-listing_form" placeholder="Password">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary">LOG IN</button>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="sign-up">
                        <div class="modal-header">
                            <h5 class="modal-title"><img src="logo.png" alt="logo"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="ti-close"></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control add-listing_form" id="name" placeholder="Your name">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control add-listing_form" id="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control add-listing_form" id="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control add-listing_form" id="password" placeholder="Password">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary">CREATE ACCOUNT</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Log In & Signup -->
    <!--//END HEADER -->
    <!--============================= MAIN TITLE =============================-->
    <section class="hero-wrap d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="hero-title">
                    <h1>Browse Research Studies</h1>
                    <h3>Current Available Studies:</h3>
                </div>
            </div>
        </div>
    </section>
    <!--//END MAIN TITLE -->
    <!-- TEST -->
    <!--============================= FEATURED LISTING =============================-->
    <div>
        <div class="row detail-checkbox-wrap">
            <div class="col-xs-12 col-sm-6 col-md-4">
            </div>
        </div>
    </div>
    <!-- <section> -->
    <!-- Card 1 -->
    <div class="row">
        <div class="col-md-6 card-2">
            <div class="card">
                <a href="humanMobilityLab.html"><img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Human Mobility Lab Study</h5>
                    <p class="card-text">The purpose of this study is to develop a database of normal, healthy walking biomechanics data to use as a baseline comparison for studies on individuals with disabilities that impair their walking abilities</p>
                </div>
                <div class="card-bottom">
                    <p><i class="ti-location-pin"></i>Human Mobility Research Lab: 166 Brock St. Kingston, ON</p>
                    <span>Now Recruiting</span>
                </div>
                </a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-md-6 card-2">
            <div class="card">
                <a href="musclePhysiologyLab.html"><img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Queen's Muscle Physiology Lab</h5>
                    <p class="card-text">Study examining the metabolic responses of recumbent cycling exercise in Males with less than 3 hours of physical activity per week</p>
                </div>
                <div class="card-bottom">
                    <p><i class="ti-location-pin"></i>Muscle Physiology Lab. Kingston, ON</p>
                    <span>Now Recruiting</span>
                </div>
                </a>
            </div>
        </div>

        <!-- Card 3-->
        <div class="col-md-6 card-2">
            <div class="card">
                <a href="depressionStudy.html"><img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Depression Study</h5>
                    <p class="card-text">Study examining the effects of a probiotic supplement on symptoms of depression</p>
                </div>
                <div class="card-bottom">
                    <p><i class="ti-location-pin"></i>Providence Care Hospital. Kingston, ON</p>
                    <span>Now Recruiting</span>
                </div>
                </a>
            </div>
        </div>
        <!--End Card 3-->
<!-- Card 4 -->
        <div class="col-md-6 card-2">
            <div class="card">
                <a href="stromanLab.html"><img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Stroman Lab Study </h5>
                    <p class="card-text">The purpose of the study is to learn more about the neural basis of pain sensitivity associated with chronic pain</p>
                </div>
                <div class="card-bottom">
                    <p><i class="ti-location-pin"></i>Queen's MRI Facility, 15 O'Kill St. Kingston, ON</p>
                    <span>Now Recruiting</span>
                </div>
                </a>
            </div>
        </div>
        <!--End Card 4-->
        <!--TAKE OUT AFTER-->
        <!-- Card 5-->
        <!-- <div class="col-md-6 card-2">
            <div class="card">
                <a href="depressionStudy.html"><img class="card-img-top" src="" alt=""></a>
                <div class="card-body">
                    <h5 class="card-title">Depression Study</h5>
                    <p class="card-text">Study examining the effects of a probiotic supplement on symptoms of depression</p>
                </div>
                <div class="card-bottom">
                    <p><i class="ti-location-pin"></i>Providence Care Hospital. Kingston, Ontario</p>
                    <span>Now Recruiting</span>
                </div>
            </div>
        </div> -->
        <!--End Card 5-->
        <!--Card 6-->
        <div class="col-md-6 card-2">
            <div class="card">
                <a href="cookLab.html"><img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Neuroscience study recruiting healthy women and women with migraine </h5>
                    <p class="card-text">The purpose of this study is to examine arterial health in the brain and other arteries in the body to determine if there are differences between women who get migranes and those who do not</p>
                </div>
                <div class="card-bottom">
                    <p><i class="ti-location-pin"></i>Centre for Neuroscience Studies (15 O'Kill St.) Kingston, ON</p>
                    <span>Now Recruiting</span>
                </div>
                </a>
            </div>
        </div>
        <!--End Card 6-->
        <!--Card 7-->
        <div class="col-md-6 card-2">
            <div class="card">
                <a href="sexStudy.html"><img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">Cardivascular Imaging Network Study</h5>
                    <p class="card-text">To broaden the scope of clinically useful techniques for early detection/screening of pulmonary hypertension and exercise-induced pulmonary hypertension using cardiac ultrasound.</p>
                </div>
                <div class="card-bottom">
                    <p><i class="ti-location-pin"></i>Kingston General Hospital (Armstrong Wing), Kingston, ON</p>
                    <span>Now Recruiting</span>
                </div>
                </a>
            </div>
        </div>
        <!--End Card 7-->
    </div>
</div>
</div>
<br>
<br>
<br>
<br>
<!-- </section> -->
<!--//END FEATURED LISTING -->
<!-- jQuery, Bootstrap JS. -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!--     <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script> -->


</body>

</html>
