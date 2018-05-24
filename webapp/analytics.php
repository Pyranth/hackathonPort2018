<?php
session_start();
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

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
		['Age Bucket', 'Number of tourists'],
		['0-4', 824.0],
		['5-9', 784.0],
       ['10-14', 743.0],
       ['15-19', 768.0],
       ['20-24', 820.0],
       ['25-29', 895.0],
       ['30-34', 881.0],
       ['35-39', 797.0],
       ['40-44', 820.0],
       ['45-49', 778.0],
       ['50-54', 778.0],
       ['55-59', 714.0],
       ['60-64', 636.0],
       ['65-69', 574.0],
       ['70-74', 415.0],
       ['75-79', 298.0],
       ['80-84', 199.0],
       ['85-89', 118.0],
       ['90-94', 47.0],
       ['95-99', 9.0],
	   ['100+', 1.0]]);
		
        var options = {
          title: 'Tourist population per age',
          curveType: 'function',
          legend: { 
			position: 'bottom'
		   },
		  vAxis: {
			title: 'Population in thousands'
		  },
		  hAxis: { 
			title: 'Age buckets',
			textStyle: {
				fontSize: 9
				}
			}
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>


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
			echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"administration.php\">Administration</a> </li>";
			} ?>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item active\"> <a class=\"nav-link\" href=\"analytics.php\">Analytics</a> </li>";
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
		<div id="curve_chart" class="col-lg-12" style="min-height:500px" ></div>
      </div>
    </div>
	<div class="container">
      <div class="row">
		<div id="curve_chart" class="col-lg-12" style="min-height:500px" ></div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
