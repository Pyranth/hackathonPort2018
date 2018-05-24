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
      <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
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
              <a class="nav-link" href="#">Home
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
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-lg-12 text-center">
          <img src="images/porto-montenegro-banner.png" class="img-fluid" alt="Responsive image">
        </div>
      </div>
    </div>

    <div id="tabela" class="table-responsive" style="padding: 25px; overflow:hidden; width: 100%; height: 1000px" onclick="azurirajTabelu()"></div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>

  </body>

</html>
