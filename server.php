<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
require("/var/www/html/phymo/db.php");


//$errors = $_SESSION['errorsTab'];


//LOGIN PAGE AND CODE
if (isset($_POST['login_user'])) 
{
	//$_SESSION['errorsTab'] = array();
	$username = mysqli_real_escape_string($db, $_POST['username']);
  	$password = mysqli_real_escape_string($db, $_POST['password']);
	if (empty($username)) 
	{
		echo " Username required ";
  		array_push($errors, "Username is required");
		$count = count($errors);
		$_SESSION['errorsTab'] = $errors;
		header("location: login.php?id={$count}");
  	}
  	if (empty($password)) 
	{
		echo "Password Required";
		array_push($errors, "Password is required");
		$count = count($errors);
		$_SESSION['errorsTab'] = $errors;
		header("location: login.php?id={$count}");
  	}
	if (count($errors) == 0)
	{
  	$password = hash('sha512', $password);
  	$query = "SELECT * FROM accounts WHERE (username='$username' OR email='$username') AND password='$password'";
		$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) 
  	{
  		$_SESSION['username'] = $username;
  		$_SESSION['success'] = "You are now logged in" . '<br>';
  		header('location: land');
  	}
		else
		{
			array_push($errors, "Wrong username/password combination");
  		$count = count($errors);
			$_SESSION['errorsTab'] = $errors;
			header("location: login.php?id={$count}");
		}
  }
	else
	{
		echo $errors[0];
	}
}




// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM accounts WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password =  hash('sha512', $password_1); 
  	$query = "INSERT INTO accounts (username, email, password) VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are registered !";
	//echo $query;
  	header('location: index.php');
  }
}



?>
