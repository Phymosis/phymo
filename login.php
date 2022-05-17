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
  
  <title>Page de Login</title>
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
        <img src="logo.png" alt="">
      </p>
      <ul class="flex"> 
        <li><a href="register2.php">Sign Up</a></li>
        <li><a href="land">Guest</a></li>
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
      
      <script src="particles.js"></script>
      <script src="demo/js/app.js"></script>
    
    </div>
  </div>

</body>
</html>
<?php  
/*
<script>
    var count_particles, stats, update;
    stats = new Stats;
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function() {
      stats.begin();
      stats.end();
      if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
        count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
      }
      requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  </script>

<script>
    var count_particles, stats, update;
    stats = new Stats;
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function() {
      stats.begin();
      stats.end();
      if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
        count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
      }
      requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
  </script>


*/
?>
