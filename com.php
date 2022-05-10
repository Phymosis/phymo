<html>  
  <link href="style.css" rel="stylesheet" type="text/css" />
  <head>  

    <?php 
    
    ?>
    <title> <?php echo "Incredible Comments Page"; ?></title> 
  </head>  
    <body>  
    <h1><?php echo "Comments of Website . <br>"; ?></h1>  
    <p>This website display the content of directory on server.</p>  

      <div id="menu" class="split left">

    



<h2>This form allows to publish comments</h2>

<form action="subCom.php">
  <label for="fname">Your comment:</label><br>
  <input type="text" id="fname" name="fname" ><br>
  
  
  <input type="submit" value="Submit">
</form> 

    </div>

    <div id="textShowing" class="split right">
       <p>
        
        
      <?php  
      
/*
      $servername = "localhost";
      $username = "root";
      $password = "password";
      $dbname = "my_crazy_db";

      $serv = new mysqli($servername, $username, $password, $dbname);
      */
      require("/var/www/html/phymo/db.php");    


      
      echo "Commentaires:" . "<br>" . "<br>"; 

      $sqlQuery = "SELECT * FROM post";

      $res = mysqli_query($db, $sqlQuery);
      if ($res) {
      while($row = mysqli_fetch_array($res)) {
        echo $row['0'] . " " . $row['1'] .  "<br>"; 
    }
    } else {
      echo "Error: " . "<br>" . mysqli_error($db);
    }

    ?>
    </p>
    </div>

    </body>  



</html> 