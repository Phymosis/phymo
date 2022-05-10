<?php 


$comment =  $_GET['fname'];
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "my_crazy_db";

$serv = new mysqli($servername, $username, $password, $dbname);
mysqli_prepare("")
if ($serv->connect_error) {
  die("Connection failed: " . $serv->connect_error);
  exit();
}
echo "Connected successfully" . "<br>";

$comment = mysqli_real_escape_string($serv, "$comment");
$comment = addslashes("$comment");
$sqlQuery = "INSERT INTO `comments` (`id`, `value`) VALUES (NULL, '$comment')";

$res = mysqli_query($serv, $sqlQuery);

if ($res) {
  echo "Comment Added" . "<br>";
  echo $comment;
  header('Location: /old/pages/com.php');
  ?>
   <a href="/old/pages/com.php">GO back to comment page <br></a> 
<?php
}
else {
  echo "Error: " . "<br>" . mysqli_error($serv);
}
 ?>