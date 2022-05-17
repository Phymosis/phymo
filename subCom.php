<?php
require("/var/www/html/phymo/db.php");
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


if(isset($_POST["subject"])){
	$comment = $_POST["subject"];
	$comment = mysqli_real_escape_string($db, "$comment");
	$parentid = NULL;
}
if(isset($_POST["sub1"])){
	$comment = $_POST["sub1"];
	$parentid = $_POST['id_parent'];

	$rq = mysqli_query($db, "SELECT * FROM `post` WHERE id = '$parentid'");
	$rq = mysqli_fetch_assoc($rq);

	if(empty($rq)){
		header('Location: com.php');
		//exit();
	}
	$comment = mysqli_real_escape_string($db, "$comment");
}
if($comment == ""){
	header('Location: com.php');
}

date_default_timezone_set('Europe/Paris');

$date = new DateTime('now');
$datetime = ''.$date->format('y-m-d h:i:s');

$username = $_SESSION["username"];

$postername = mysqli_query($db, "SELECT `id` FROM `accounts` WHERE username = '$username'");
$postername = mysqli_fetch_assoc($postername)["id"];



if(is_null($parentid)){
	$sqlQuery = "INSERT INTO `post` (`idowner`,`msg`,`post_date`,`parentid`) VALUES ('$postername', '$comment','$datetime',NULL)";
}
else{
	$sqlQuery = "INSERT INTO `post` (`idowner`,`msg`,`post_date`,`parentid`) VALUES ('$postername', '$comment','$datetime','$parentid')";
}
//echo $sqlQuery . "<br>";

$res = mysqli_query($db, $sqlQuery);

if ($res) {
  header('Location: com.php');
?>
<?php
}
else {
  echo "Error: " . "<br>" . mysqli_error($db);
}
 ?>