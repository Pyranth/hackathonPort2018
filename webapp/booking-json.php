<?php

require_once "dbscripts\config.php";

$myArray = array();
$reservs = array();

$checkin_date = $_GET['checkin'];
$checkout_date = $_GET['checkout'];

$timex = strtotime($checkin_date);
$checkin_date = date("Y/m/d", $timex);

$time = strtotime($checkout_date);
$checkout_date = date("Y-m-d", $time);

$br_kreveta = $_GET['adults'] + $_GET['children'];

if ($result = $mysqli->query("SELECT * FROM room 
WHERE BEDS >= " . $br_kreveta . " AND room.ROOMID NOT IN(
SELECT DISTINCT(room.ROOMID) as booked FROM room, reservation
WHERE
CAST(\"". $checkin_date . "\" AS DATE) BETWEEN OD AND DO
AND room.ROOMID = reservation.ROOMID)")) {
	while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    }
}

echo json_encode($myArray);

?>