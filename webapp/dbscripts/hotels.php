<?php
require_once 'config.php';
$myArray = array();
if ($result = $mysqli->query("SELECT * FROM hotel")) {

    while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();

?>