<?php

require_once '../config.php';



if (isset($_GET['clean']))
	$clean = $_GET['clean'] == 'true' ? true : false;

if (isset($_GET['dnd']))
	$dnd = $_GET['clean'] == 'true' ? true : false;

if (isset($_GET['spa']))
	$spa = $_GET['clean'] == 'true' ? true : false;

if (isset($_GET['massage']))
	$massage = $_GET['clean'] == 'true' ? true : false;

if (isset($_GET['message']))
	$massage = $_GET['message'];

$query = "INSERT INTO requirements (PersonID";

if (isset($_GET['clean']))
	$query .= ", `Clean Room`";

if (isset($_GET['dnd']))
	$query .= ", `Do Not Disturb`";

if (isset($_GET['spa']))
	$query .= ", `Spa`";

if (isset($_GET['massage']))
	$query .= ", Massage";

if (isset($_GET['message']))
	$query .= ", `Special Req`";

$query .= ") VALUES (1";

if (isset($_GET['clean']))
	if ($_GET['clean'] == 'true')
		$query .= ", TRUE";
	else
		$query .= ", FALSE";

if (isset($_GET['dnd']))
	if ($_GET['dnd'] == 'true')
		$query .= ", TRUE";
	else
		$query .= ", FALSE";

if (isset($_GET['spa']))
	if ($_GET['spa'] == 'true')
		$query .= ", TRUE";
	else
		$query .= ", FALSE";

if (isset($_GET['massage']))
	if ($_GET['massage'] == 'true')
		$query .= ", TRUE";
	else
		$query .= ", FALSE";

if (isset($_GET['message']))
{
	$query .= ", '";
	$query .= $_GET['message'];
	$query .= "'";
}

$query .= ");";

$link->query($query);
if($query)
	 return "Success";
 else
	 return "Faliture";

?>