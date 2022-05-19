<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$isLogged = false;
if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
    $isLogged = true;
}



if(array_key_exists('subscribe-button', $_POST)) {
    subscribeToAccount($db);
}

function subscribeToAccount($db) {
    $token = sha1(mt_rand(1, 90000) . 'SALT');
    $username = $_SESSION["username"];
    $query = "DELETE FROM `accounts` WHERE `accounts`.`username`='$username'";
    mysqli_query($db, $query);
    unset($_SESSION['username']);
    header("Refresh:0");
}

require_once("/var/www/html/db.php");
$usernameProfile = $_GET['user'];

$id = getUserId($db, $usernameProfile);
if ($id != NULL) {
    echo "Profile Page:";
    echo $usernameProfile . "<hr>";
    if ($isLogged) {
	if ($usernameProfile != $username){
	?>
		<form method="post">
			<input type="submit" name="subscribe-button" class="button" value="Subscribe to <?php echo $usernameProfile; ?>" />
		</form>
	<?php
	}
    ?>
    <div class="panel panel-default">
  <div class="panel-body">
    <form action="/subCom.php" method="post">
      <div class="form-group">
        <p style="position:sticky">Type here :</p>
        <textarea name="sub2" rows="3"></textarea>
        <input type='hidden' name='user' value='<?php echo $usernameProfile; ?>'/><br>
      </div>
      <input type="submit"/>
    </form>

      <?php

      if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
        exit();
      }
    ?>
    <p style="color:green">Successfully Connected</p>
  </div>
</div>
 <div id="textShowing" class="split right">
       <p>
      <h1 align="center">Comments:</h1>
      <hr>
      </p>
      <?php
      $sqlQuery = "SELECT * FROM `post` WHERE idreceiver = $id";
      $res = mysqli_query($db, $sqlQuery);

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
                echo "<form action='/subCom.php' method='post' style='width: 70%; margin-left: 39%; margin-right: 33%;'>
                <input type='text' disabled='disabled' name='' value='$postername' style='text-align: center;' size=$len/>
                <input type='text' disabled='disabled' name='' value='$row[post_date]'] style='text-align: center;' size=15/><br>
                <input type='hidden' name='parent' id='parent${pos}' value='$row[id]'/>
                <div class='msg' id='msg${pos}'><textarea disabled id='ok' style='position: sticky; width: 500px;'> $row[msg]</textarea></div>
                <input type='button' value='reply' id='btn${pos}'/>
                </form>";
                $sqlQuery2 = "SELECT * FROM post WHERE post.parentid = '$idd'";
                $res2 = mysqli_query($db, $sqlQuery2);
                $ind += 1;
                while($row2 = mysqli_fetch_assoc($res2))
                {
                    $ndid = $row2["idowner"];
                    $na = mysqli_query($db, "SELECT `username` FROM `accounts` WHERE `id` = '$ndid'");
                    $na = mysqli_fetch_assoc($na);
                    echo "<form action='/subCom.php' style='width: 60%; margin-left: 41%'>
                    <input type='text' disabled='disabled' name='' value='$na[username]' style='text-align: center;' size=$len>
                    <input type='text' disabled='disabled' name='' value='$row2[post_date]'] style='text-align: center;' size=15><br>
                    <div class='msg1' id='msg${pos}'><textarea disabled id='ok' style='position: sticky; width: 500px;'>$row2[msg]</textarea></div>
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
                    x.innerHTML = `<form method='post' action='/subCom.php'>
                        <input type='hidden' name='id_parent' value='${t}'/>
                        <input type='textarea' name='sub1'/>
                        <input type='hidden' name='user' value='<?php echo $usernameProfile; ?>'/><br>
                        <input type='submit' value='post'/>
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

            console.log(l.length);
            
            for(;i < l.length;i++){
                btn = document.getElementById('btn' + i.toString(10));
                console.log('btn'+ i.toString(10));
                btn.addEventListener('click',event => {
                    AddTxtArea(event.target.id[event.target.id.length - 1]);
                });
            }
    </script>
    </div>
    <?php
    }
    else{
    ?>

    <p>You need to be logged before subcribing to someone.</p>
    <p>Go to <a href="http://localhost/login.php">login page to login</a> or <a href="http://localhost/register.php">Register page to create an account.</a></p>

    <?php
    }
}
else
{
    print("Damn bro this user does not exists ! We think you're looking for a ghost");
}



/* 

$rows   contains all info about comment 
$row[4] contains the content of the message.
*/

?>
