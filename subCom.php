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
//echo "Connected successfully" . "<br>";

$comment = $_POST["subject"];
$comment = mysqli_real_escape_string($db, "$comment");
$likes = 0;


date_default_timezone_set('Europe/Paris');
//echo $timezone;
$date = new DateTime('now');
$datetime = ''.$date->format('y-m-d h:i:s');
//echo $datetime . "\n";
$username = $_SESSION["username"];

$postername = mysqli_query($db, "SELECT `id` FROM `accounts` WHERE username = '$username'");
$postername = mysqli_fetch_assoc($postername)["id"];

$sqlQuery = "INSERT INTO `post` (`idowner`,`msg`,`likes`,`temporality`,`parentid`) VALUES ('$postername', '$comment',0,'$datetime',NULL)";

//echo $sqlQuery . "<br>";

$res = mysqli_query($db, $sqlQuery);

if ($res) {
  //echo "Comment Added" . "<br>";
  //oecho $comment . " writed by : " . $username;
  header('Location: com.php');
?>
<?php
//<a href="com.php">GO back to comment page <br></a>
}
else {
  echo "Error: " . "<br>" . mysqli_error($db);
}
 ?>