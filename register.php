<?php

include('server.php');

if (session_status() == PHP_SESSION_NONE) {
      session_start();
}

if (isset($_GET['id'])) {
  if ($_GET['id'] >= 1)
  {
    $errors = $_SESSION['errorsTab']; 
    include('errors.php');
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  
  <title>Register Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="parent">
    <div id="particles-js">
      <nav class="navbar flex">
      <div class="brand">
        <a href="register2.php">Phymos</a>
      </div>
      <p class="aligncenter">
        <img src="images/logo.png" >
      </p>
      <ul class="flex"> 
        <li><a href="login.php">Login</a></li>
        <li><a href="land">Guest</a></li>
      </ul>
      </nav>
      <section>
        <form method="post" class="formplace-2" action="server.php">
          <?php include('errors.php'); ?>
          <input type="text"  name="username" placeholder="username" >
          <input type="text" name="email" placeholder="email">
          <input type="password"  name="password_1" placeholder="password" >
          <input type="password" name="password_2" placeholder="Confirmation password">
          <button type="submit" class="button-2" name="reg_user">Register</button>
          <p> Already a member?<a href="login.php">Login</a></p>
        </form>
      </section>

      <script src="particles.js"></script>
      <script src="js/app.js"></script>
    
    </div>
  </div>

</body>
</html>


