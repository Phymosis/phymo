<?php

require_once('db.php');
$result = mysqli_query($db, "SELECT username FROM `accounts`");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();
?>
