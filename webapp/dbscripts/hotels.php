<?php

$db = new mysqli('10.71.9.138', 'monty', 'some_pass', 'hackathon');

if ($db->connect_error){
	die("error");
}

$query = $db->query('SELECT * FROM hotel');
$fields = array();
$i = 0;
while($row = $query->fetch_assoc()) {
    $fields[$i] = $row['HOTELID'];
	$fields[$i] .= $row['HOTELNAME'];
	$i++;
}

echo(json_encode($fields));

?>