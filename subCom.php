<?php 


$comment =  $_GET['fname'];
/*
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "my_crazy_db";
$serv = new mysqli($servername, $username, $password, $dbname);
*/
require("/var/www/html/phymo/db.php");    
mysqli_prepare($db);
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
  exit();
}
echo "Connected successfully" . "<br>";

$comment = mysqli_real_escape_string($db, "$comment");
$comment = addslashes("$comment");





//corriger la query pour faire matcher les valeurs avec la struct sql
$sqlQuery = "INSERT INTO `post` (`id`, `value`) VALUES (NULL, '$comment')";




$res = mysqli_query($db, $sqlQuery);

if ($res) {
  echo "Comment Added" . "<br>";
  echo $comment;
  header('Location: /old/pages/com.php');
  ?>
   <a href="/old/pages/com.php">GO back to comment page <br></a> 
<?php
}
else {
  echo "Error: " . "<br>" . mysqli_error($db);
}
 ?>