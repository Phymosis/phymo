<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $db = mysqli_connect('localhost', 'root', 'QrxSgtQ36keW89m', 'phplogin');
    $lvl_check_query = "SELECT level FROM `accounts` WHERE username='$username' OR email='$username'";

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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Account Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
    <h1>Control Panel</h1>
</div>
<div class="content">
    

    

    <?php  if (isset($_SESSION['username'])) : ?>
        <p><h2>Welcome <strong><?php echo $_SESSION['username']; ?></strong> in your account panel !</h2></p>
        <p> </p>
        
<p><strong>Change Password:</strong></p>
<form action="serverOld.php" method="post">
Username: <input type="text" name="username"><br>
Password: <input type="text" name="password"><br>
<input type="submit">
</form>

<p><strong><h3><a href="delete.php" style="color: red;">Delete Account</a></h3></strong></p>

        <p> </p>
        <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
    

    <?php  if ($_SESSION['username'] === 'admin' || $_SESSION['username'] === 'julien.cohen-scali@epita.fr') : ?>
        <p> <a href="/phpmyadmin" style="color: red;">Php My Admin</a> </p>
    <?php endif ?>



</div>
</body>
</html>
