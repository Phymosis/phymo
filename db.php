<?php  


function cleanInput(string $input){
    $input = mysql_real_escape_string($input);
    return $input;
}

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


$host = getDbHost();
$userdb = 'admin';
$passdb = '5Iz3p&OnMr9rT7W$';
$dbname = 'phymo';

$db = mysqli_connect($host, $userdb, $passdb, $dbname);



?>
