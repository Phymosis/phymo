<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }
  if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    require_once("/var/www/html/db.php");
  }
  $actualToken = getUserToken($db, $username);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Management</title>
</head>
<body>

<div class="header">
    <h1>Control Panel</h1>
</div>
<div class="content">

<p><h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong> in your account panel !</h2></p>
        <p> </p>    

    <?php
        if(array_key_exists('changePass-button', $_POST)) {
            changePass($db, $username);
        }
        function changePass($db, $username) {
            $newPass = hash('sha512', $_POST['newPass']);
            $oldPass = hash('sha512', $_POST['oldPass']);
            $repNewPass = hash('sha512', $_POST['repNewPass']);
            $token = getUserToken($db,$username);
            
            $query = "SELECT password FROM accounts WHERE username='$username' AND token='$token'";
            $result = mysqli_query($db,$query);
            $row = mysqli_fetch_assoc($result);
            $realOldPass = $row['password'];

            if ($realOldPass === $oldPass) {
                if ($newPass == $repNewPass) {
                    $username = $_SESSION["username"];
                    $query = "UPDATE accounts SET password='$newPass' WHERE username='$username' AND token='$token'";
                    mysqli_query($db, $query);
                    echo '<script type="text/javascript">alert("'."Password Updated !".'");</script>'; 
                    
                }
                else
                {
                    echo '<script type="text/javascript">alert("'."Password does not match !".'");</script>'; 
                }
            }
            else
            {
                echo '<script type="text/javascript">alert("'."Wrong Password !".'");</script>';
            }
        }


        if(array_key_exists('createToken-button', $_POST)) {
            createTokenbutton($db);
        }
        function createTokenbutton($db) {
            $token = sha1(mt_rand(1, 90000) . 'SALT');
            $username = $_SESSION["username"];
            $query = "UPDATE accounts SET token='$token' WHERE username='$username'";
            mysqli_query($db, $query);
            header("Refresh:0");
        }


        if(array_key_exists('delAccount-button', $_POST)) {
            deleteAccount($db);
        }
        function deleteAccount($db) {
            $username = $_SESSION["username"];
            $query = "DELETE FROM `accounts` WHERE `accounts`.`username`='$username'";
            mysqli_query($db, $query);
            unset($_SESSION['username']);
            header("Refresh:0");
        }
    ?>

    <p><strong><h3>Token Manager:</h3></strong></p>
<?php

if ($actualToken == '') {?>

    <p><strong><h4 style="color: red;">No Token Set !</h4></strong></p>
    <form method="post">
        <input type="submit" name="createToken-button" class="button" value="Create Token" />  
    </form><?php
}
else 
{
    ?><p><strong><h4 style="color: green;">Token OK.</h4></strong></p><?php
}
 


if (isset($_SESSION['username'])) : ?>       
    <p><strong><h3>Change Password:</h3></strong></p>


<?php

if ($actualToken != '') {
    ?>
<div class="input-group">
    <br><form method="post">
        Old Password: <input type="text" name="oldPass"><br>
        New Password: <input type="text" name="newPass"><br>
        Repeat Password: <input type="text" name="repNewPass"><br>
        <input type="hidden" name="userToken" value="<?php echo $actualToken ?>  ">
        <input type="submit" name="changePass-button" class="button" value="Change Password" />
    </form>
</div>
<?php
}
else{
?>
            <p><strong><h4 style="color: red;">Can't Change Password Without Token !</h4></strong></p>
 

    </form>
<?php
}
?>

<p><strong><h3 >Delete Your Account:</h3></strong></p>
<form method="post">
    <input type="submit" name="delAccount-button" class="button" value="Delete Account" />
</form>


        <p> </p>
        <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
    

    



</div>
</body>
</html>
