<?php

require_once 'dbscripts/config.php';


if(isset($_REQUEST['req'])) {

    $connection = $mysqli;
    $result = $connection->query("SELECT requirements.REQID, guest.BROJSOBE, guest.NAME, guest.SURNAME,requirements.`Clean Room`,requirements.`Do Not Disturb`,
    requirements.Spa,requirements.Massage,requirements.`Special Req`
    FROM requirements
    INNER JOIN guest ON requirements.PersonID=guest.ID");

    echo "<table class=\"table\"><tr class=\"first_row\"><th>Room number</th><th>Name</th><th>Last name</th>
    <th>Clean room</th><th>Do not disturb</th><th>Spa</th><th>Massage</th><th>Special requirement</th><th>Done</th></tr>";
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['BROJSOBE']."</td>";
            echo "<td>" . $row['NAME'] . "</td>";
            echo "<td>" . $row['SURNAME'] . "</td><td>";
            if($row['Clean Room']==0)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>";
            if($row['Do Not Disturb']==0)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>";
            if($row['Spa']==0)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>";
            if($row['Massage']==0)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>".$row['Special Req']."</td><td>";
            echo "<button class='btn-success' style='border-radius: 10px;'>Done</button></td><tr>";
        }
    }
    echo "</table>";
}
?>


