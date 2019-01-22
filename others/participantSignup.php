<?php
include('server.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Surjith S M">
  <meta name="description" content="#">
  <meta name="keywords" content="#">
  <!-- Favicons -->
  <link rel="shortcut icon" href="#">
  <!-- Page Title -->
  <title>Research Stream</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="bootstrap.min.css">
  <!--MIGHT WANT THIS: to customize sign in --> 
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
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
              <a class="navbar-brand" href="index.html"><img class="img-fluid" src="assets/images/Research Stream-01.png" height="100px" width="200px" alt=""></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">

                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<!--Bootstrap Sign In-->
<body class="text-center">
  <!--Form needs to go somewhere-->
  <form action="server.php" method="post" class="form-signin">
    <br>
    <br>
    <br>
    <?php
include('errors.php');
?>
    <h1 class="h3 mb-3 font-weight-normal">Create a free participant account!</h1>
    <label for="inputName" class="sr-only">Full Name</label>
    <input type="name" id="inputName" class="form-control" name="name" placeholder="Full Name" required autofocus>
    <br>
    <label for="inputAge" class="sr-only">Age</label>
    <input type="age" id="inputAge" class="form-control" name="age" placeholder="Age" required autofocus>
    <br>
    <label for="inputCity" class="sr-only">City</label>
    <input type="city" id="inputCity" class="form-control" name="city" placeholder="City" required autofocus>
    <br>
    <label for="inputphone" class="sr-only">Primary Phone Number</label>
    <input type="number" id="inputphone" class="form-control" name="phonenum" placeholder="Primary Phone Number" required autofocus>
    <br>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
    <br>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password"placeholder="Password" required>
    <label>
      <input type="checkbox" value="consent" name="over18"> I am over 18
    </label>
    <br>
    <br>
    <div>
    </div>
    <label>
      <!--Check out wording on this-->
      <input type="checkbox" value="consent" name="privacy"> I consent to the <a href="terms.html">Terms and Conditions</a> and <a href="privacypolicy.html">Privacy Policy</a>
    </label>
    <br>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="reg_participant">Sign Up</button>
    <br>
    <p>Already have an account? Log in <a href="login.php">here</a></p>
  </form>

</body>
</html>
