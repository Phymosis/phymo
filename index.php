<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    require("/var/www/html/phymo/db.php");    
/*
    $lvl_check_query = "SELECT level FROM `accounts` WHERE username='$username' OR email='$username'";
    $result = mysqli_query($db, $lvl_check_query);
*/

    //$tmparr = $result->fetch_array();
    //$level = intval($tmparr[0]);
    $level = 12;
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
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
    <h2>Home Page</h2>
</div>
<div class="content">
    <!-- notification message -->
    <?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
        <h3>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>

    <!-- logged in user information -->
    

    <?php  if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> </p>
        

<?php if ($level >= 1) : ?>
    <p> <a href="challenge/challenge1.php" style="color: blue;">Challenge 1</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 1</a> </p>
<?php endif; ?>

<?php if ($level >= 2) : ?>
    <p> <a href="challenge/challenge2.php" style="color: blue;">Challenge 2</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 2</a> </p>
<?php endif; ?>

<?php if ($level >= 3) : ?>
    <p> <a href="challenge/challenge3.php" style="color: blue;">Challenge 3</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 3</a> </p>
<?php endif; ?>
       
<?php if ($level >= 4) : ?>
    <p> <a href="challenge/challenge4.php" style="color: blue;">Challenge 4</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 4</a> </p>
<?php endif; ?>


<?php if ($level >= 5) : ?>
    <p> <a href="challenge/challenge5.php" style="color: blue;">Challenge 5</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 5</a> </p>
<?php endif; ?>

<?php if ($level >= 6) : ?>
    <p> <a href="challenge/challenge6.php" style="color: blue;">Challenge 6</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 6</a> </p>
<?php endif; ?>

<?php if ($level >= 7) : ?>
    <p> <a href="challenge/challenge7.php" style="color: blue;">Challenge 7</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 7</a> </p>
<?php endif; ?>

<?php if ($level >= 8) : ?>
    <p> <a href="challenge/challenge8.php" style="color: blue;">Challenge 8</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 8</a> </p>
<?php endif; ?>

<?php if ($level >= 9) : ?>
    <p> <a href="challenge/challenge9.php" style="color: blue;">Challenge 9</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 9</a> </p>
<?php endif; ?>

<?php if ($level >= 10) : ?>
    <p> <a href="challenge/challenge10.php" style="color: blue;">Challenge 10</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 10</a> </p>
<?php endif; ?>

<?php if ($level >= 10) : ?>
    <p> <a href="challenge/challenge11.php" style="color: blue;">Challenge 11</a> </p>
<?php else : ?>
    <p> <a style="color: red;">Challenge 11</a> </p>
<?php endif; ?>

    <p> <a href="account.php" style="color: red;">Manage Account</a> </p>
    <p> </p>
    <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
<?php endif ?>
    

    <?php  if ($_SESSION['username'] === 'admin' || $_SESSION['username'] === 'julien.cohen-scali@epita.fr') : ?>
        <p> <a href="/phpmyadmin" style="color: red;">Php My Admin</a> </p>
    <?php endif ?>



</div>
</body>
</html>
