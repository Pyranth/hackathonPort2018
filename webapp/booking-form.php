<?php
require_once "dbscripts\config.php";

if(isset($_REQUEST['checking'])){


$myArray = array();
$reservs = array();

$checkin_date = $_REQUEST['checking'];
$checkout_date = $_REQUEST['checkout'];

$timex = strtotime($checkin_date);

$checkin_date = date("Y/m/d", $timex);

$time = strtotime($checkout_date);
$checkout_date = date("Y-m-d", $time);

$br_kreveta = $_REQUEST['adults'] + $_REQUEST['children'];

echo "<table class=\"table\"><tr class='first_row'><th>Hotel name</th><th>Room type</th>
    <th>Beds</th><th>Price</th></tr>";
if ($result = $mysqli->query("SELECT * FROM room 
WHERE BEDS >= " . $br_kreveta . " AND room.ROOMID NOT IN(
SELECT DISTINCT(room.ROOMID) as booked FROM room, reservation
WHERE
CAST(\"". $checkin_date . "\" AS DATE) BETWEEN OD AND DO
AND room.ROOMID = reservation.ROOMID)")) {
	while($row = $result->fetch_array(MYSQL_ASSOC)) {
        $hotel = $mysqli->query("SELECT HOTELNAME FROM `hotel` WHERE HOTELID=" . $row['HOTELID']);
        echo "<tr><td>";
        if ($hotel->num_rows>0){
            while ($row1 = mysqli_fetch_assoc($hotel)){
                echo $row1['HOTELNAME'] ."</td>";
            }
        }
        echo "<td>" . $row['ROOMNAME'] . "</td>";
        echo "<td>".$row['BEDS']."</td>";
        echo "<td>" . $row['PRICE'] . "</td></tr>";
            //$myArray[] = $row;
    }

    }
    echo "</table>";
}
//echo json_encode($myArray);
?>