<html>
  <link href="style.css" rel="stylesheet" type="text/css" />
  <head>

    <?php
    	if(session_status() == PHP_SESSION_NONE){
			session_start();
    	}
    ?>
    <title> <?php echo "Incredible Comments Page"; ?></title>
  </head>
    <body>
    <h1 align="center">Comments of Website</h1>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >


<div class="panel panel-default">
<div class="panel-heading">Submit Your Comments</div>
  <div class="panel-body">
  	<form method="post" action="subCom.php">
  	  <div class="form-group">
	  </div>
	  <div class="form-group">
	    <p style="position:sticky">Type here :</p>
	    <textarea name="subject" class="form-control" rows="3"></textarea>
	  </div>
	  <input type="submit" class="btn btn-primary" />
	</form>
      <?php
	  require("/var/www/html/phymo/db.php");

      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
        exit();
      }
	?>
	<p style="color:green">Successfully Connected</p>
  </div>
</div>
</div>

    <div id="textShowing" class="split right">
       <p>
      <h1 align="center">Comments:</h1>
	  </p>
      <?php
      $sqlQuery = "SELECT * FROM post";
      $res = mysqli_query($db, $sqlQuery);
      if ($res) {
      while($row = mysqli_fetch_array($res)) {
	        $nedid = $row["idowner"];
	        $postername = mysqli_query($db, "SELECT `username` FROM `accounts` WHERE `id` = '$nedid'");
			$postername = mysqli_fetch_assoc($postername);
			$postername = $postername["username"];
			$len = strlen($postername);
	        echo "<form>
		 	<input type='text' disabled='disabled' name ='' value='$postername' style='text-align: center;' size=$len>
			<input type='text' disabled='disabled' name ='' value='$row[temporality]'] style='text-align: center;' size=15><br>
			<textarea disabled style='position: relative;'> $row[msg]</textarea>
			</form>";
    	    echo nl2br("\n");
    	}
    } else {
	  echo "Error: " . "<br>" . mysqli_error($db);
    }

    ?>
    </div>
    </body>

</html>