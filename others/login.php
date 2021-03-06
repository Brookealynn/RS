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
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <!-- Themify Icon -->
  <link rel="stylesheet" href="themify-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="font-awesome.min.css">
  <!-- Hover Effects -->
  <link href="set1.css" rel="stylesheet">
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
  <form class="form-signin" action="login.php" method="POST">
    <br>
    <br>
    <br>
 <?php
 include('errors.php');
?> 
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="emailaddress" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button id="hello" class="btn btn-lg btn-primary btn-block" type="submit" name="login_participant" onclick="login();">Sign in</button>
    <br>
    <!--hyperlink to here-->
    <p>Don't have an account? Sign up <a href="participantSignup.php">here</a></p>
    <p class="mt-5 mb-3 text-muted">&copy; 2018</p>
  </form>
</body>
</html>
