<?php

/*$host = getDbHost();
$userdb = 'admin';
$passdb = '5Iz3p&OnMr9rT7W$';
$dbname = 'phymo';

function getDbHost() {
    if (PHP_OS == 'Linux'){
        $ipconf = shell_exec("ifconfig");
        $host = '';
        if (strpos($ipconf, '192.168.1.110') !== false) {
            $host = '192.168.1.111';
        }
        else{
            $host = '82.64.10.157';
        }
        if (isset($_SESSION['username']) ) {
            if ($_SESSION['username'] === 'admin') {
                echo $host;
            }
        }
    }
    return $host;
}

$db = mysqli_connect($host, $userdb, $passdb, $dbname);
*/
require_once('../db.php');
$result = mysqli_query($db, "SELECT username FROM `accounts`");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();
?>