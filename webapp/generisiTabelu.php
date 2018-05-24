<?php
<<<<<<< HEAD
require_once "dbscripts\config.php";
=======

require_once 'dbscripts/config.php';

>>>>>>> fe7b8c450248aadf3c485933a3a05da63405fa44
if(isset($_REQUEST['req'])) {
    $connection = $mysqli;

    $result = $connection->query("SELECT requirements.REQID, guest.NAME, guest.SURNAME,requirements.`Clean Room`,requirements.`Do Not Disturb`,
    requirements.Spa,requirements.Massage,requirements.`Special Req`
    FROM requirements
    INNER JOIN guest ON requirements.PersonID=guest.ID");

    echo "<table class=\"table\"><tr><th>ID</th><th>Name</th><th>Surname</th>
    <th>Clean room</th><th>Do Not Disturb</th><th>Spa</th><th>Massage</th><th>Special Requirement</th></tr>";
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>".$row['REQID']."</td>";
            echo "<td>" . $row['NAME'] . "</td>";
            echo "<td>" . $row['SURNAME'] . "</td><td>";
            if($row['Clean Room']==null)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>";
            if($row['Do Not Disturb']==null)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>";
            if($row['Spa']==null)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>";
            if($row['Massage']==null)
                echo "NO";
            else
                echo "YES";
            echo "</td><td>".$row['Special Req']."</td><tr>";
        }
    }
    echo "</table>";
}
?>