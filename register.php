<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>ProtectWeb Register</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Welcome On ProtectWeb</h2>
  </div>
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label for="username">
	  <i class="fas fa-user"></i></label>
  	  <input type="text" name="username" placeholder="Enter Username">
  	</div>

  	<div class="input-group">
  	  <label for="email"><i class="fas fa-envelope"></i></label>
  	  <input type="email" name="email" placeholder="Enter Email">
  	</div>
  	<div class="input-group">
  	  <label><i class="fas fa-lock"></i></label>
  	  <input type="password" name="password_1" placeholder="Enter Password">
  	</div>
  	<div class="input-group">
  	  <label for="password_2"><i class="fas fa-lock"></i></label>
  	  <input type="password" name="password_2" placeholder="Confirm Password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
