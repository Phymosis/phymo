<!DOCTYPE html>
<html lang="en">
<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}

?>
<head>
	<meta charset="UTF-8">
	<meta none="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="app.css">
	<link href="https://www.flaticon.com/free-icons/shapes-and-symbols">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Welcome</title>
	<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body{
			width: 100%;
			height: 100%;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
		}

		nav{
			padding: 0 50px;
			width: 100%;
		}


		.flex{
			display: flex;
			justify-content: space-between;
			align-items: center;
		}


		.navbar{
			background-color: #2c2c2c;
			height: 50px;
			cursor: pointer;
		}


		.brand{
			color: #edc967;
			margin-top: 30px;
			text-transform: uppercase;
			font-size: 16px;
			cursor: pointer;
		}


		.logo{
			width: 25px;
			height: 25px;
			position: absolute;
			left: 50%;

			content: "";
			margin-left: -75px;
		}

		.banner{
			text-align: center;
			padding-top: 100px;
			color: #edc967;
		}

		.banner-text{
			max-width: 550px;
			margin: 0 auto;
		}

		.banner h1{
			font-size: 48px;
			font-weight: 400;
			font-family: 'Playfair Display', serif;
		}

		.globe{
			position: relative;
			background-image: url("images/main_globe.png");
			background-size: default;
			background-repeat: no-repeat;
			background-position: center center;
			height: 500px;
			margin-top: 150px;
		}

		.orbit{
			width: 500px;
			height: 500px;
			display: inline-block;
			border-radius: 50%;
			border: 1px solid #edc967;
			position: absolute;
			left: 0;
			right: 0;
			margin: 0 auto;
			animation: orbit 60s linear 0s infinite;
		}

		@keyframes orbit{
			to{
				transform: rotate(360deg);
			}
		}
		.icon{
			position: absolute;
			width: 100px;
			height: 100px;
			padding: 28px;
			border-radius: 50%;
			border: 1px solid #2c2c2c;
			background-color: #2c2c2c;
			transition: all ease 0.5s;
			background: radial-gradient(at 75% 25%, gray, black);
		}

		.icon:hover{
			border-color: #edc967;
			background-color: #edc967;
			box-shadow: 0 4px 94px #d6bd5a;
		}

		li{
			list-style: none;
		}

		a{
			text-decoration: none;
			font-size: 16px;
			margin-left: 30px;
			color: #edc967;
			font-weight: 400;
		}

		html,body{
			width:100%;
			height:100%;
			background: linear-gradient(#696969 75%, black);
		}


		html{
		  -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
		}

		body{
		  font: normal 75% Arial, Helvetica, sans-serif;
		}


		canvas{
		  display:block;
		  vertical-align:bottom;
		}

		.comet{
			position: absolute;
			width: 10px;
			height: 140px;
			background: linear-gradient(to top, #8D918D, transparent);
			top: 100px;
			left: 100px;
			border-radius: 50px;
			animation: comet 7s ease 0s infinite;
		}
		@keyframes comet{
			from{
				transform: translateY(-500%);
				opacity: 1;
			}
			to{
				transform: translateY(500%);
				opacity: .3;
			}
		}
		.comet:nth-child(2){
			top: 300px;
			left: 400px;
			animation-delay: .7s;
			animation-duration: 6s;
		}
		.comet:nth-child(3){
			top: 500px;
			left: 200px;
			animation-delay: .5s;
			animation-duration: 3s;
		}
		.comet:nth-child(4){
			top: 100px;
			right: 100px;
			left: inherit;
			animation-delay: .2s;
			animation-duration: 4s;
		}
		.comet:nth-child(5){
			top: 300px;
			right: 400px;
			left: inherit;
			animation-delay: .8s;
			animation-duration: 7s;
		}
		.comet:nth-child(6){
			top: 500px;
			right: 200px;
			left: inherit;
		}
		.comet:nth-child(7){
			top: 0;
			left: 45%;
		}
		.comet:nth-child(even){
			background: linear-gradient(to top, #2c2c2c, transparent);
			box-shadow: 0 4px 94px #2c2c2c;
		}
		/*.content{
			position: absolute;
			align-items: center;
			height: 100px;
			top: calc((100% - 100px) / 2);
		}*/
	</style>
</head>

<body style="overflow-x: hidden; overflow-y: hidden;">


<nav class="navbar flex">
	<div class="brand">
		<h1 style="color: #edc967">Phymos</h1>
	</div>
	<div class="logo">
		<a href="."><img src="images/logo.png" alt=""></a>
	</div>
	<ul class="flex" style="position: absolute; right: 30px;">
		<?php
		$ar = "";
		if(isset($_SESSION["username"]))
		{
			$n = $_SESSION["username"];
			$loc = "account.php";
			$res = "document.location=$loc";
			echo"
			<li><a href='#'>News</a></li>
			<li><a href='u/$n'>My profile</a></li>
			<li><a href='explore'>Explorer</a></li>
			<li><a href='index.php?logout=1'>Log out&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
			<li><div onclick=$res id='gear' style='color: grey;'><i class='fa fa-gear fa-spin' style='font-size:27px;'></i></div></li>";

		}
		else{
			echo "<li><a href='login.php'>Log In</a></li>
			<li><a href='register.php'>Sign Up</a></li>";
		}
		?>
	</ul>
</nav>
<div class="banner">
	<div class="asteroid">
		<div class="comet"></div>
		<div class="comet"></div>
		<div class="comet"></div>
		<div class="comet"></div>
		<div class="comet"></div>
		<div class="comet"></div>
		<div class="comet"></div>
	</div>
		<div class="banner-text">
			<!--<h1>Welcome to PHYMOS</h1> -->
		</div>
</div>
<div class="content">

            <!--<h1>&#x2728;Search Your Friends !&#x2728;</h1>-->
            <div id="searchWrapper">
                <input
                    type="text"
                    name="searchBar"
                    id="searchBar"
                    placeholder="search a profile"
                />
            </div>
            <ul id="charactersList"></ul>
       <script src="js/app.js"></script>
</div>

<div class="globe">
	<!--div class="globe-img">
		<img src="images/main_globe.png" alt="">
	</div-->
	<div class="orbit">
		<?php
		   $i = 0;
			$planets = [
				"blob" => "'challenge/challenge1.php'",
				"genial" => "'challenge/challenge2.php'",
				"excellent" => "'challenge/challenge3.php'",
				"brillant" => "'challenge/challenge4.php'",
				"sublime" => "'challenge/challenge5.php'",
				"super" => "'challenge/challenge6.php'",
				"fantastique" => "'challenge/challenge7.php'",
				"magistral" => "'challenge/challenge8.php'",
			];
		?>
		<?php foreach ($planets as $label => $addr) { ?>
			<?php
				$x = cos($i * 2 * pi() / count($planets)) * 250;
				$y = sin($i * 2 * pi() / count($planets)) * 250;
			?>
			<div onclick="document.location=<?=$addr; ?>" class="icon" style="left: <?=250 + $x - 50; ?>px; top: <?=250 + $y - 50; ?>px;">
				<img src="" alt="">
				<a href >
			</div>
			<?php $i = $i + 1;?>
		<?php } ?>
	</div>
</body>
