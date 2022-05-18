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

  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="style.css">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
  <div class="parent">
    <div id="particles-js">
      <nav class="navbar flex">
      <div class="brand">
      	<h1><a href="login.php">Phymos</a></h1>
      </div>
      <p class="aligncenter">
        <img src="images/logo.png" alt="">
      </p>
      <ul class="flex">
        <li><a href="register2.php">Sign Up</a></li>
        <li><a href="index.php">Guest</a></li>
      </ul>
      </nav>
      <section>
        <form method="post" class="formplace" action="server.php">
          <?php include('errors.php'); ?>
          <input type="text"  name="username" placeholder="username" >
          <input type="password" name="password" placeholder="password">
          <button type='submit' class="button-1" name="login_user"role="button">Login</button>
		      <p>Not yet a member <a href="register2.php">Sign up</a></p>
        </form>
      </section>
      <script src="js/particles.js"></script>
      <script src="js/app.js"></script>
    </div>
  </div>
</body>
</html>
