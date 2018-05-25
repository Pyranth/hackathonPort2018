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
    <th>Beds</th><th>Price</th><th>Reservation</th></tr>";
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
        echo "<td>" . $row['PRICE'] . "</td>";
        echo "<td><button type='button' data-toggle=\"modal\" data-target=\"#myModal\" class='btn-success' style='border-radius: 10px;' >Reservation</button></td></tr>";
            //$myArray[] = $row;
    }

    }
    echo "</table>";
}
//echo json_encode($myArray);
?>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #00467e; font-family: Gotham Book, sans-serif; color: #fff;">
                <h4 class="modal-title">Reservation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form>
                    <label class="form-control">First name:<input class="form-control" type="text" placeholder="Jonh"></label>
                    <label class="form-control">Last name:<input class="form-control" type="text" placeholder="Smith"></label>
                    <label class="form-control"> Phone:<input class="form-control" type="text" placeholder="xx xxx xxx"></label>
                    <label class="form-control">E-mail:<input class="form-control" type="email" placeholder="porto@porto.com"></label>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class='btn-success' style='border-radius: 10px;' class="btn btn-default" data-dismiss="modal">Reserves</button>
            </div>
        </div>

    </div>
</div>
