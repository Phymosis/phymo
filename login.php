<?php 
include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>ProtectWeb Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
  <div class="header">
  	<h2>Welcome Back On ProtectWeb</h2>
  </div>
  <form method="post" action="server.php">
  	<?php
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
  	<div class="input-group">
  		<label>
		<i class="fas fa-user"></i></label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label><i class="fas fa-lock"></i></label></label>
  		<input type="password" name="password">
  	</div>
<p>
                Not yet a member? <a href="register.php">Sign up</a>
        </p>

  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  </form>
</body>
</html>


<?php

/*


if (!isset($_SESSION['errorsTab']))
{
  echo "Not Sey";
}
else
{
//$errors = $_SESSION['errorsTab'];

//echo count($errors);
//echo $_SESSION['username'];
}
if (isset($_SESSION['errorsTab']))
{
  if (count($errors) > 0) { ?>
  <div class="error">
        <?php   echo count($errors);
                foreach ($errors as $error) { ?>
          <p><?php echo $error ?></p>
        <?php }
}?>
  </div>
<?php
}*/

?>