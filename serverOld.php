<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'phpmyadmin', '!27tVpb6', 'phplogin');
$color = "#cc0022";
echo "<span style=\"color: $color\">This page should not be displayed to users ! Only For Debug <br></span>";
//LOGIN PAGE AND CODE

	$username = $_POST['username'];
  	$password = $_POST['password'];
	if (empty($username)) 
	{
		echo " Username required ";
  	}
  	if (empty($password)) 
	{
		echo "Password Required";
  	}
	if (count($errors) == 0)
	{
  		$query = "SELECT * FROM sqlChal WHERE username='$username' AND password='$password'";
		echo nl2br($query . "\n");
		$results = mysqli_query($db, $query);

  		if (mysqli_num_rows($results) != 0)
		{
			$results = mysqli_query($db, $query);
  	  		$_SESSION['usernameSql'] = $username;
  	  		echo "You are now logged in ";
  	  		echo $_SESSION['usernameSql'];
			echo "<br> There is " . mysqli_num_rows($results) . " results <br>";
			while($row = mysqli_fetch_assoc($results)){
    				foreach($row as $cname => $cvalue){
        				print "$cname: $cvalue\t<br>";
    				}
    				print "<br>";
			}
  		}
		else {
  			echo "Wrong username/password combination";
  		}
  	}
	else
	{
		echo $errors[0];
	}


?>
