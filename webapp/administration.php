<?php
session_start();

if (isset($_SESSION['username']))
{
	require_once 'dbscripts/config.php';
	
	$db = $mysqli;

	if ($db->connect_error){
		die("error");
	}

	$query = $db->query('DESCRIBE `hotel`');
	$fields_hotel = array();
	while($row = $query->fetch_assoc()) {
		$fields_hotel[] = $row['Field'];
	}
	
	$query = $db->query('DESCRIBE `room`');
	$fields_room = array();
	while($row = $query->fetch_assoc()) {
		$fields_room[] = $row['Field'];
	}
	
	$query = $db->query('DESCRIBE `services`');
	$fields_service = array();
	while($row = $query->fetch_assoc()) {
		$fields_service[] = $row['Field'];
	}
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Porto Montenegro - Vitual Hotel Assistant</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="styles/default.css" rel="stylesheet">

	<style>
	form {
  /* Just to center the form on the page */
  margin: 0 auto;
  width: 400px;

  /* To see the limits of the form */
  padding: 1em;
  border: 1px solid #CCC;
  border-radius: 1em;
}

div + div {
  margin-top: 1em;
}

label {
  /* To make sure that all label have the same size and are properly align */
  display: inline-block;
  width: 90px;
  text-align: right;
}

input, textarea {
  /* To make sure that all text field have the same font settings
     By default, textarea are set with a monospace font */
  font: 1em sans-serif;

  /* To give the same size to all text field */
  width: 300px;

  -moz-box-sizing: border-box;
       box-sizing: border-box;

  /* To harmonize the look & feel of text field border */
  border: 1px solid #999;
}

input:focus, textarea:focus {
  /* To give a little highligh on active elements */
  border-color: #000;
}

textarea {
  /* To properly align multiline text field with their label */
  vertical-align: top;

  /* To give enough room to type some text */
  height: 5em;

  /* To allow users to resize any textarea vertically
     It works only on Chrome, Firefox and Safari */
  resize: vertical;
}

.button {
  /* To position the buttons to the same position of the text fields */
  padding-left: 90px; /* same size as the label elements */
}

button {
  /* This extra magin represent the same space as the space between
     the labels and their text fields */
  margin-left: .5em;
}
</style>
	
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar transparent navbar-expand-lg navbar-inverse fixed-top">
      <div class="container navbar-inner">
        <a class="navbar-brand" href="#">Virtual Hotel Assistant</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item active\"> <a class=\"nav-link\" href=\"booking.php\">Booking</a> </li>";
			} ?>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item active\"> <a class=\"nav-link\" href=\"reception.php\">Reception</a> </li>";
			} ?>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item active\"> <a class=\"nav-link\" href=\"administration.php\">Administration</a> </li>";
			} ?>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"analytics.php\">Analytics</a> </li>";
			} ?>
			<?php if(!isset($_SESSION['username'])){
			echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"login/login.php\">Login</a> </li>";
			} ?>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"login/logout.php\">Logout</a> </li>";
			} ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
			<form method="post">
			  <div>
				<label for="name">Room name:</label>
				<input type="text" id="name" name="user_name">
			  </div>

			  <div>
				<label for="mail">Hotel:</label>
				<input type="email" id="mail" name="user_email">
			  </div>

			  <div>
				<label for="msg">Beds:</label>
				<input type="email" id="mail" name="user_email">
			  </div>
			  
			  <div>
				<label for="msg">Price:</label>
				<input type="email" id="mail" name="user_email">
			  </div>
			 
			  <div class="button">
				<button type="submit">Insert</button>
			  </div>
			</form>
        </div>
      </div>
    </div>
	
	<div class="container">
      <div class="row justify-content-center align-self-center">
        <div class="col-lg-12 text-center">
          <form action="/my-handling-form-page" method="post">
			  <div>
				<label for="name">Hotel name:</label>
				<input type="text" id="name" name="user_name">
			  </div>

			  <div>
				<label for="mail">Hotel type:</label>
				<input type="email" id="mail" name="user_email">
			  </div>
			 
			  <div class="button">
				<button type="submit">Insert</button>
			  </div>
			</form>
        </div>
      </div>
    </div>
	
	<div class="container">
      <div class="row justify-content-center align-self-center">
        <div class="col-lg-12 text-center">
          <form action="/my-handling-form-page" method="post">
			  <div>
				<label for="name">Service:</label>
				<input type="text" id="name" name="user_name">
			  </div>

			  <div>
				<label for="mail">Service type:</label>
				<input type="email" id="mail" name="user_email">
			  </div>
			 
			  <div class="button">
				<button type="submit">Insert</button>
			  </div>
			</form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
