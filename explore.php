<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$isLogged = false;
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $isLogged = true;
}




require_once("/var/www/html/phymo/db.php");
printf("This page is the main Page where you can explore the content of the people you are following");

if (!$isLogged) {
?>
<p>You need to be logged before exploring others content.</p>
<p>Go to <a href="http://localhost/phymo/login.php">login page to login</a> or <a href="http://localhost/phymo/register.php">Register page to create an account.</a></p>
<?php
}
else{
?>

<p>Go Explore !</p>

<?php
}


/* 

$rows   contains all info about comment 
$row[4] contains the content of the message.
*/

?>
