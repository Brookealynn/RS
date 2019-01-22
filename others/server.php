<?php
session_start();

	// variable declaration
$institution = "";
$address = "";
$country = "";
$department = "";
$who = "";
$name = "";
$age = "";
$city = "";
$phone = "";
$email = "";
$password = "";
$legal = "";
$terms = "";
$privacy = "";
$errors = array();
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'resea620_superya', 'november20', 'resea620_participants');
  //add if...die thing here

	// REGISTER USER
if (isset($_POST['reg_participant'])) {
	$who = 1;
	$isRegistered = 1;
		// receive all input values from the form

	$name = mysqli_real_escape_string($db, $_POST['name']);
	$age = mysqli_real_escape_string($db, $_POST['age']);
	$city = mysqli_real_escape_string($db, $_POST['city']);
	$phone = mysqli_real_escape_string($db, $_POST['phonenum']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (isset($_POST['over18'])) {
		$legal = $_POST['over18'];
	}

	// if (isset($_POST['iagree'])) {
	// 	$terms = $_POST['iagree'];
	// }

	if (isset($_POST['privacy'])) {
		$privacy = $_POST['privacy'];
	}

		// form validation: ensure that the form is correctly filled
	if (empty($email)) { array_push($errors, "Email is required"); }
	// if (empty($legal)) { array_push($errors, "Please agree to the Terms"); }
	// if (empty($terms)) { array_push($errors, "You must be over 18 to join"); }
	if (empty($privacy)) { array_push($errors, "Please agree to the Privacy Policy");}
	if (empty($name)) { array_push($errors, "Name is required"); }
	if (empty($phone)) { array_push($errors, "Phone is required"); }
	if (empty($password)) { array_push($errors, "Password is required"); }
	if (empty($age)) { array_push($errors, "Age is required"); }
	if (empty($city)) { array_push($errors, "City is required"); }

	$sqlEmailDup = "SELECT EMAIL FROM users WHERE EMAIL = '$email'";
	$emailDupResults = mysqli_query($db, $sqlEmailDup);
	if (mysqli_num_rows($emailDupResults) > 0) { array_push($errors, "Email is taken"); }

	$sqlPhoneDup = "SELECT PHONE FROM users WHERE PHONE = '$phone'";
	$phoneDupResults = mysqli_query($db, $sqlPhoneDup);
	if (mysqli_num_rows($phoneDupResults) > 0) { array_push($errors, "Phone number is taken"); }

	// register user if there are no errors in the form
	// foreach ($errors as $error) { 
	// 	echo $error;
	// }
	// echo(($errors));
	if (count($errors) == 0) {
			$password = md5($password); // encrypt the password before saving in  the database
			$query4 = "INSERT INTO users (`NAME`,`AGE`,`CITY`,`PHONE`,`EMAIL`,`ACCOUNT_PASSWORD`)VALUES ('$name', '$age', '$city', '$phone', '$email', '$password')";
			$result4 = mysqli_query($db, $query4);

			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			$url = "isRegistered=$isRegistered";
			header('location: browse.php?'.$url);
		}

	}

		// REGISTER USER
	if (isset($_POST['reg_researcher'])) {
		$who = 0;
		$isRegistered = 1;
		// receive all input values from the form

		$password = mysqli_real_escape_string($db, $_POST['password']);
		$name = mysqli_real_escape_string($db, $_POST['name']);
		$institution = mysqli_real_escape_string($db, $_POST['institution']);
		$department = mysqli_real_escape_string($db, $_POST['department']);
		$address = mysqli_real_escape_string($db, $_POST['address']);
		$country = mysqli_real_escape_string($db, $_POST['country']);
		$phone = mysqli_real_escape_string($db, $_POST['phonenum']);
		$email = mysqli_real_escape_string($db, $_POST['email']);

		if (isset($_POST['over18'])) {
			$legal = $_POST['over18'];
		}

		// if (isset($_POST['iagree'])) {
		// 	$terms = $_POST['iagree'];
		// }

		if (isset($_POST['privacy'])) {
			$privacy = $_POST['privacy'];
		}

		// form validation: ensure that the form is correctly filled
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($legal)) { array_push($errors, "Please agree to the Terms"); }
		if (empty($terms)) { array_push($errors, "You must be over 18 to join"); }
		if (empty($privacy)) { array_push($errors, "Please agree to the Privacy Policy");}
		if (empty($name)) { array_push($errors, "Name is required"); }
		if (empty($phone)) { array_push($errors, "Phone is required"); }
		if (empty($password)) { array_push($errors, "Password is required"); }
		if (empty($country)) { array_push($errors, "Country is required"); }
		if (empty($institution)) { array_push($errors, "Institution is required"); }
		if (empty($department)) { array_push($errors, "Department is required"); }

		$sqlEmailDup = "SELECT EMAIL FROM users WHERE EMAIL = '$email'";
		$emailDupResults = mysqli_query($db, $sqlEmailDup);
		if (mysqli_num_rows($emailDupResults) > 0) { array_push($errors, "Email is taken"); }

		$sqlPhoneDup = "SELECT PHONENUM FROM users WHERE PHONENUM = '$phone'";
		$phoneDupResults = mysqli_query($db, $sqlPhoneDup);
		if (mysqli_num_rows($phoneDupResults) > 0) { array_push($errors, "Phone number is taken"); }

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password); // encrypt the password before saving in  the database
			$query4 = "INSERT INTO RSIGNUP (`ACCOUNT_PASSWORD`,`NAME`,`INSTITUTION`,`DEPARTMENT`,`ADDRESS`,`COUNTRY`, `PHONENUM`, `EMAIL`)VALUES ('$password', '$name', '$institution', '$department', '$address', '$country', '$phone', '$email')";
			$result4 = mysqli_query($db, $query4);

			$_SESSION['email_researcher'] = $email;
			$_SESSION['success'] = "You are now logged in";
			$url = "isRegistered=$isRegistered&hello=hello";
			//reasearcher homepage
			header('location: addAStudy.php?'.$url);
		}

	}

	// ...

	// LOGIN USER
	if (isset($_POST['login_participant'])) {
		$email = mysqli_real_escape_string($db, $_POST['emailaddress']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE EMAIL = '$email' and ACCOUNT_PASSWORD ='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {
				$_SESSION['email'] = $email;
				$_SESSION['success'] = "You are now logged in";
				header('location: browse.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}

	// LOGIN USER
	if (isset($_POST['login_researcher'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT EMAIL FROM RSIGNUP WHERE EMAIL = '$email' and ACCOUNT_PASSWORD ='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) > 0) {
				$_SESSION['email_researcher'] = $email;
				$_SESSION['success'] = "You are now logged in";
				//researcher homepage
				header('location: addAStudy.php');
			}else {
				array_push($errors, "Wrong email/password combination");
			}
		}
	}


	?>
