<!DOCTYPE html>
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

<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

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

      //$sqlQuery2 = "SELECT * FROM post WHERE ";
      //$res2 = mysqli_query($db, $sqlQuery2);
      $pos = 0;
      $ind = 0;
      if ($res) {
      while($row = mysqli_fetch_array($res)) {
      		if($row['parentid'] == NULL){
	        	$nedid = $row["idowner"];
	        	$idd = $row["id"];
	        	$postername = mysqli_query($db, "SELECT `username` FROM `accounts` WHERE `id` = '$nedid'");
				$postername = mysqli_fetch_assoc($postername);
				$postername = $postername["username"];
				$len = strlen($postername);
	        	echo "<form action='subCom.php' method='post' style='width: 70%;'>
		 		<input type='text' disabled='disabled' name ='' value='$postername' style='text-align: center;' size=$len>
				<input type='text' disabled='disabled' name ='' value='$row[post_date]'] style='text-align: center;' size=15><br>
				<input type='hidden' name='parent' id='parent${pos}' value='$row[id]'/>
				<div class='msg' id='msg${pos}'><textarea disabled id='ok' style='position: sticky; width: 500px;'> $row[msg]</textarea></div>
				<input type='button' value='reply' name='subject' id='btn${pos}'/>
				</form>";
				$sqlQuery2 = "SELECT * FROM post WHERE post.parentid = '$idd'";
      			$res2 = mysqli_query($db, $sqlQuery2);
      			$ind += 1;
      			while($row2 = mysqli_fetch_assoc($res2))
      			{
      				$ndid = $row2["idowner"];
      				$na = mysqli_query($db, "SELECT `username` FROM `accounts` WHERE `id` = '$ndid'");
      				$na = mysqli_fetch_assoc($na);
	   	    	 	echo "<form style='width: 60%;'>
			 		<input type='text' disabled='disabled' name ='' value='$na[username]' style='text-align: center;' size=$len>
					<input type='text' disabled='disabled' name ='' value='$row2[post_date]'] style='text-align: center;' size=15><br>
					<div class='msg' id='msg${pos}'><textarea disabled id='ok' style='position: sticky; width: 500px;'>$row2[msg]</textarea></div>
					</form>";
					$ind += 1;
      			}
				$pos += 1;
				echo nl2br("\n");
			}
    	}
    } else {
	  echo "Error: " . "<br>" . mysqli_error($db);
    }
    ?>
    <script>
			var i = 0;
			var y = 0;
			var booll = 0;
			function AddTxtArea(y){
				if(booll == 0){
					var x = document.createElement('div');
					var t = document.getElementById('parent' + y).value;
					console.log(t);
					x.id = 'repl' + y;
					x.innerHTML = `<form method='post' action='subCom.php'>
						<input type='hidden' name='id_parent' value='${t}'/>
	  					<input type='textarea' name='sub1'/>
	  					<input type='submit' value='post'>
					</form>`;
					booll = 1;
					document.getElementById('msg' + y).appendChild(x);
				}
				else{
					var el = document.getElementById('repl' + y);
					console.log(el.getElementsByTagName('input')[0].value);
					p = el.parentNode;
					p.removeChild(el);
					booll = 0;
				}
			}
			l = document.getElementsByClassName('msg');
			for(;i < l.length;i++){
				btn = document.getElementById('btn' + i.toString(10));
				btn.addEventListener('click',event => {
					AddTxtArea(event.target.id[event.target.id.length - 1]);
				});
			}
	</script>
    </div>
    </body>

</html>