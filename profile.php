<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$isLogged = false;
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
    $isLogged = true;
}




if(array_key_exists('delAccount-button', $_POST)) {
            deleteAccount($db);
        }
        function deleteAccount($db) {
            $token = sha1(mt_rand(1, 90000) . 'SALT');
            $username = $_SESSION["username"];
            $query = "DELETE FROM `accounts` WHERE `accounts`.`username`='$username'";
            mysqli_query($db, $query);
            unset($_SESSION['username']);
            header("Refresh:0");
        }



require_once("/var/www/html/phymo/db.php");
$usernameProfile = $_GET['user'];

$id = getUserId($db, $usernameProfile);
if ($id != NULL) {
    echo "Profile Page:";
    echo $usernameProfile . "<hr>";
    if ($isLogged) {
    ?>
    <form method="post">
            <input type="submit" name="createToken-button" class="button" value="Subscribe to <?php echo $usernameProfile; ?>" />  

        </form>
    <?php
    }
    else{
    ?>

    <p>You need to be logged before subcribing to someone.</p>
    <p>Go to <a href="http://localhost/phymo/login.php">login page to login</a> or <a href="http://localhost/phymo/register.php">Register page to create an account.</a></p>

    <?php
    }


    print "<hr>";
    $query = "SELECT * FROM post WHERE idowner='$id'";
    $result = mysqli_query($db,$query);

    if ($result === NULL) {
        echo "NULLLLLL";
    }

    $rows = [];
    while($row = $result->fetch_row()) {
        $message = $row[4];
        $date = $row[3];
        print("By " . $usernameProfile . ":<br>" . $message . "<br>Posted $date.") . "<hr>" ;
        
    }
}
else
{
    print("Damn bro this user does not exists ! We think you're looking for a ghost");
}



/* 

$rows   contains all info about comment 
$row[4] contains the content of the message.
*/

?>
