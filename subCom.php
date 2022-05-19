<?php
require("/var/www/html/db.php");
/*if (session_status() == PHP_SESSION_NONE) {
    session_abort();
    header('Location: login.php');
}*/

if (session_status() == PHP_SESSION_NONE)
	session_start();
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
  exit();
}

$username = $_SESSION["username"];
$comment = "";
$parentid = NULL;
$usernprofile = "";
if(isset($_POST["sub2"])){
	$comment = $_POST["sub2"];
	$usernprofile = $_POST["user"];
	$comment = mysqli_real_escape_string($db, "$comment");
	$parentid = NULL;
}
if(isset($_POST["sub1"])){
	$comment = $_POST["sub1"];
	$usernprofile = $_POST["user"];
	echo $usernprofile;
	$parentid = $_POST['id_parent'];

	$rq = mysqli_query($db, "SELECT * FROM `post` WHERE id = '$parentid'");
	$rq = mysqli_fetch_assoc($rq);

	if(empty($rq)){
		header('location: /u/$usernprofile');
		//exit();
	}
	$comment = mysqli_real_escape_string($db, "$comment");
}
if($comment == ""){
	header('location: /u/$usernprofile');
}

date_default_timezone_set('Europe/Paris');

$date = new DateTime('now');
$datetime = ''.$date->format('y-m-d h:i:s');
$id = getUserId($db, $usernprofile);
$postername = mysqli_query($db, "SELECT `id` FROM `accounts` WHERE username = '$username'");
$postername = mysqli_fetch_assoc($postername)["id"];



if(is_null($parentid)){
	$sqlQuery = "INSERT INTO `post` (`idowner`,`msg`,`post_date`,`parentid`,`idreceiver`) VALUES ('$postername', '$comment','$datetime',NULL,'$id')";
}
else{
	$sqlQuery = "INSERT INTO `post` (`idowner`,`msg`,`post_date`,`parentid`,`idreceiver`) VALUES ('$postername', '$comment','$datetime','$parentid','$id')";
}
//echo $sqlQuery . "<br>";

$res = mysqli_query($db, $sqlQuery);

if ($res) {
  header("location: /u/$usernprofile");
?>
<?php
}
else {
  echo "Error: " . "<br>" . mysqli_error($db);
}
 ?>