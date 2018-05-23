<?php

$mysqli = new mysqli('192.168.1.61','monty','some_pass','hackathon');
$myArray = array();
if ($result = $mysqli->query("SELECT * FROM room")) {

    while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    }
    echo json_encode($myArray);
}

$result->close();
$mysqli->close();

?>