<?php  


function getUserToken(mysqli $db, string $username)
{
    $query = "SELECT token FROM accounts WHERE username='$username'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_assoc($result);
    return $row['token'];
}

function getUserId(mysqli $db, string $username)
{
    $query = "SELECT id FROM accounts WHERE username='$username'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_assoc($result);
    if ($row != NULL) {
        return $row['id'];
    }
    else{
        return NULL;
    }

}

function cleanInput(string $input){
    $input = mysql_real_escape_string($input);
    return $input;
}

function getDbHost() {
    if (PHP_OS == 'Linux'){
        $ipconf = shell_exec("ifconfig");
        $host = '';
        if (strpos($ipconf, '192.168.1.1') !== false) {
            $host = '192.168.1.112';
        }
        else{
            $host = '82.64.10.157';
        }
    }
    return $host;
}


$host = getDbHost();
$userdb = 'admin';
$passdb = '5Iz3p&OnMr9rT7W$';
$dbname = 'phymo';

$db = mysqli_connect($host, $userdb, $passdb, $dbname);



?>
