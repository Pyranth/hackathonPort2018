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
          <form id="generate-form" type="POST">
			<?php foreach($fields_hotel as $field): ?>
				<?php 
				if ($field == "HOTELID")
						continue;
				echo "<label>";
				if ($field == "HOTELNAME"){
					echo "<span>Hotel name: </span>"; 
				}
				echo "<input type=\"text\" name=\"" . $field . " />";
					
				echo "</label><br/>";
				?>
			<?php endforeach; ?>
			<input type="submit" name="submit" />
			</form>
        </div>
      </div>
    </div>
	
	<div class="container">
      <div class="row justify-content-center align-self-center">
        <div class="col-lg-12 text-center">
          <form id="generate-form" type="POST">
			<?php foreach($fields_room as $field): ?>
				<label>
					<?php echo "$field: "; ?>
					<input type="text" name="<?php echo $field; ?>" />
				</label><br/>
			<?php endforeach; ?>
			<input type="submit" name="submit" />
			</form>
        </div>
      </div>
    </div>
	
	<div class="container">
      <div class="row justify-content-center align-self-center">
        <div class="col-lg-12 text-center">
          <form id="generate-form" type="POST">
			<?php foreach($fields_service as $field): ?>
				<label>
					<?php
					echo "$field: "; ?>
					<input type="text" name="<?php echo $field; ?>" />
				</label><br/>
			<?php endforeach; ?>
			<input type="submit" name="submit" />
			</form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
