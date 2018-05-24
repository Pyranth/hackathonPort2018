<?php

require_once 'dbscripts/config.php';

$myArray = array();
if ($result = $mysqli->query("SELECT DISTINCT g.NAME, g.SURNAME, s.NAME_SERVICES FROM guest_services gs LEFT JOIN guest g ON gs.ID = g.ID LEFT JOIN services s ON gs.ID_SERVICES = s.ID_SERVICES WHERE g.NAME=\"John\"")) {

    while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    }
}

foreach ($myArray as $res){
	print_r($res['NAME_SERVICES']);
	echo "<br>";
}

?>