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

$query = "UPDATE requirements SET `PersonID`=1, `Clean Room`=";
if (isset($_GET['clean']))
	if ($_GET['clean'] == 'true')
		$query .= "'1',";
	else
		$query .= "'0',";

$query .= "`Do Not Disturb`=";

if (isset($_GET['dnd']))
	if ($_GET['dnd'] == 'true')
		$query .= "'1',";
	else
		$query .= "'0',";
$query .= "`Spa`=";

if (isset($_GET['spa']))
	if ($_GET['spa'] == 'true')
		$query .= "'1',";
	else
		$query .= "'0',";
$query .= "`Massage`=";

if (isset($_GET['massage']))
	if ($_GET['massage'] == 'true')
		$query .= "'1',";
	else
		$query .= "'0',";
$query .= "`Special Req`='";
if (isset($_GET['message']))
{
	$query .= $_GET['message'];
	$query .= "'";
	$query .= "WHERE `REQID` = 6;";
}

$link->query($query);
if($link)
	 echo "Success";
 else
	 echo "Faliture";

?>