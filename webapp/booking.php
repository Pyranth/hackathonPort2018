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
	<style>	
		.nesto {
	padding: 0;
	margin: 0;
	outline: none;
}
.nesto {
	background-color: #d9d9d9;
	font-size: 14px;
	font-family: "Gotham Book", sans-serif;
}
.nesto a {
	text-decoration: none;
	color: #fb6362;
}
.nesto a:hover {
	color: #f98584;
}
.nesto li {
	list-style: none;
}
.nesto h2 {
	font-weight: normal;

}
/* for containers */
.nesto .container {
	margin: 20px auto;
	background-color: #fff;
	overflow: hidden;
	border-radius: 4px;
	box-shadow: 0 0 10px rgba(0,0,0,0.2), 0 2px 3px rgba(0,0,0,0.4);
}
.nesto .container .icon {
	background-image: url('https://res.cloudinary.com/dw369yzsh/image/upload/v1483213851/icons_wykol9.png');
	width: 27px;
	height: 30px;
}
.nesto .calendar th, .graph {
	font-family: "Gotham Medium", sans-serif;
	color: #666666;
}
/*buttons*/
.nesto .container button {
	text-transform: uppercase;
	border: none;
	background-color: #fb6362;
	color: #fff;
	margin: 0 auto;
	display: block;
	box-shadow: 0 3px 5px rgba(0,0,0,0.2), 0 1px 2px rgba(0,0,0,0.8);
	border-radius: 4px;
	font-size: 15px;
	font-family: "Gotham Book", sans-serif;
	cursor: pointer;
	-webkit-transition: background-color 0.2s; 
	   -moz-transition: background-color 0.2s; 
		-ms-transition: background-color 0.2s; 
		 -o-transition: background-color 0.2s; 
			transition: background-color 0.2s; 
}
.nesto .container button:hover {
	background-color: #f98584;
}
.nesto .container button:active {
	background-color: #f98584;
	position: relative;
	top: 2px;
}
.nesto button.button-big {
	width: 296px;
	height: 58px;
}
/*inputs*/
.nesto .input-text {
	border-radius: 2px;
	background-color: #f4f4f4;
	box-shadow: inset 0px 1px 1px 0px rgba(0, 0, 0, 0.25);
	padding-left: 11px;
	position: relative;
	height: 46px;
	line-height: 46px;
}
.nesto .input-text .icon {
	position: absolute;
	right: 4px;
	top: 4px;
}
.nesto .input-text input, .input-text textarea, .div-file label {
	border: none;
	background-color: transparent;
	font-family: "Gotham Light", sans-serif;
	color:#999999;
}
/*placeholders hell*/
.nesto .container .input-text input::-webkit-input-placeholder, .container .input-text textarea::-webkit-input-placeholder {
	color:#999999;
	font-family: "Gotham Light", sans-serif;
	font-size: 14px;
}
.nesto .container .input-text input::-moz-placeholder, .container .input-text textarea::-moz-placeholder {
	color:#999999;
	font-family: "Gotham Light", sans-serif;
	font-size: 14px;
}
.nesto .container .input-text input:-moz-placeholder, .container .input-text textarea:-moz-placeholder {
	color:#999999;
	font-family: "Gotham Light", sans-serif;
	font-size: 14px;
}
.nesto .container .input-text input:-ms-input-placeholder, .container .input-text textarea:-ms-input-placeholder {
	color:#999999;
	font-family: "Gotham Light", sans-serif;
	font-size: 14px;
}


.nesto #overlay {
	z-index:3; /* пoдлoжкa дoлжнa быть выше слoев элементoв сaйтa, нo ниже слoя мoдaльнoгo oкнa */
	position:fixed; /* всегдa перекрывaет весь сaйт */
	background-color:#000; /* чернaя */
	opacity:0.8; /* нo немнoгo прoзрaчнa */
	width:100%; 
	height:100%; /* рaзмерoм вo весь экрaн */
	top:0; /* сверху и слевa 0, oбязaтельные свoйствa! */
	left:0;
	display: none;
}


/***** Calendar *****/

.nesto .calendar {
	width: 346px;
	height: 426px;
	position: fixed;
	top: 50%; /* oтступaем сверху 45%, oстaльные 5% пoдвинет скрипт */
	left: 50%; /* пoлoвинa экрaнa слевa */
	margin-top: -213px;
	margin-left: -173px;
	z-index: 5;
	display: none;
}
.nesto .calendar .header {
	background-color: #404a58;
	color: #fff;
	font-size: 17px;
	height: 64px;
	line-height: 64px;
	text-align: center;
	position: relative;
}
.nesto .calendar .arr {
	position: absolute;
	width: 13px;
	height: 30px;
	cursor: pointer;
	top: 25px;
}
.nesto .calendar .prev {
	left: 38px;
}
.nesto .calendar .next {
	background-position: 0 -30px;
	right: 38px;

}
/*table*/
.nesto .calendar table {
	width: 287px;
	height: 248px;
	margin: 11px auto 20px auto;
	text-align: center;
	vertical-align: middle;
	color: #666666;
}
.nesto .calendar tr, td {
	width: 41px;
}
.nesto .calendar td:not(.notCurMonth) {
	cursor: pointer;
	-webkit-transition: background-color 0.2s; 
	   -moz-transition: background-color 0.2s; 
		-ms-transition: background-color 0.2s; 
		 -o-transition: background-color 0.2s; 
			transition: background-color 0.2s;
}
.nesto .calendar td:not(.notCurMonth):not(.curDay):hover {
	background-color: #f4f4f4;
	border-radius: 19px;
}
.nesto .calendar .holiday {
	font-weight: bold;
	color: #fb6362;
}
.nesto .calendar .curDay {
	font-weight: bold;
	color: #fff;
	background-color: #fb6362;
	border-radius: 19px;
}
.nesto .calendar .notCurMonth {
	color: #c5c5c5;
}



/***** Booking form *****/

.nesto .booking {
	width: 346px;
	height: 626px;
}
.nesto .is-sent{
	animation: launch 1s ease-in-out forwards
} 
.nesto @keyframes launch {
  0% {
            transform: translateY(0);
  }
  10%, 15% {
            transform: translateY(20px);
  }
  100% {
            transform: translateY(-700px);
  }
  
}
.nesto .booking .header {
	width: 100%;
	height: 90px;
	position: relative;
	color: #000000;
}
.nesto .booking .header div {
	position: absolute;
	left: 22px;
	top: 30px;
}
.nesto .booking .header h2 {
	font-size: 25px;
}
.nesto .booking .header p {
	font-family: "Gotham Light", sans-serif;
	margin: 4px 0 0 21px;
}
.nesto .booking .header .icon {
	background-position: 0 -60px;
	position: absolute;
	left: 4px;
	top: 33px;
 
}
/*inputs*/
.nesto .booking .dates, .booking .persons {
	width: 296px;
	margin: 26px auto 0 auto;
}
.nesto .booking label:not(.checkbox) {
	display: block;
}
.nesto .booking .dates .input-text {
	margin-top: 10px;
}
.nesto .booking .dates .input-text:nth-child(2) {
	margin-bottom: 20px;
}
.nesto .booking .input-text .icon {
	width: 36px;
	height: 36px;
	background-color: #404a58;
	border-radius: 2px;
	background-position: 10px -80px;
	cursor: pointer;
}
/*checkbox*/
.nesto .div-chck {
	position: relative;
	margin-top: 16px;
}
.nesto .div-chck input, .div-chck .icon.input-text  {
	top: -2px;
	left: 0;
	position: absolute;
	width: 23px;
	height: 23px;
}
.nesto .div-chck input {
	opacity: 0;
	z-index: 1;
}
.nesto .div-chck .icon.input-text {
	background-position: -30px -415px;
	background-repeat: no-repeat;
	padding: 0;
	margin: 0;
}
.nesto .div-chck input:checked+.icon {
	background-position: 4px -415px;
}
.nesto .div-chck label{
	margin-left: 34px;
}
/*selects*/
.nesto .booking .persons li {
	display: inline-block;
	font-size: 0;
	width: 45%;
}
.nesto .booking .persons li:last-child {
	padding-left: 20px;
}
.nesto .booking .persons label {
	font-size: 14px;
}
.nesto .booking .persons .input-text {
	width: 138px;
	height: 45px;
	padding: 0;
	margin-top: 9px;
}
.nesto .booking .persons select {
	font-size: 14px;
	width: 100%;
	height: 100%;
	background: transparent;
	border: none;
	font-size: 16px;
	color: #404a58;
	padding-left: 9px;
	position: relative;
	z-index: 1;
	-webkit-appearance: none;
	   -moz-appearance: none;
		-ms-appearance: none;
		 -o-appearance: none;
			appearance: none;
}
.nesto .booking .persons option {
	background-color: #f4f4f4;
} 
.nesto .booking .persons option:hover {
	background-color: red;
}
.nesto .booking .persons .icon {
	background-position: 15px -106px;
}

/*button*/
.nesto .booking .button-big {
	position: relative;
	padding-left: 20px;
	margin-top: 40px;
}
.nesto .booking .button-big .icon {
	background-position: 0 -150px;
	position: absolute;
	left: 59px;
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
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"administration.php\">Administration</a> </li>";
			} ?>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item\"> <a class=\"nav-link\" href=\"analytics.php\">Analytics</a> </li>";
			} ?>
			<?php if(isset($_SESSION['username'])){
			echo "<li class=\"nav-item active\"> <a class=\"nav-link\" href=\"booking.php\">Booking</a> </li>";
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
        <div class="col-lg-12 text-center nesto">
			<div id="overlay"></div>
	<div class="container calendar">
		<div class="header">
			<div class="icon arr prev"></div>
			<div class="month">May 2014</div>
			<div class="icon arr next"></div>
		</div>
		<table>
			<tr>
				<th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
			</tr>
			<tr>
				<td class="notCurMonth">29</td><td class="notCurMonth">30</td>
				<td>1</td><td>2</td><td class="curDay">3</td><td>4</td><td>5</td>
			</tr>
			<tr>
				<td>6</td><td class="holiday">7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td>
			</tr>
			<tr>
				<td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td>
			</tr>
			<tr>
				<td>20</td><td>21</td><td>22</td><td class="holiday">23</td><td>24</td><td>25</td><td>26</td>
			</tr>
			<tr>
				<td>27</td><td>28</td><td>29</td><td>30</td>
				<td class="notCurMonth">1</td><td class="notCurMonth">2</td class="notCurMonth"><td class="notCurMonth">3</td>
			</tr>
		</table>
		<button class="button-big" id="add_event">Add event</button>
	</div>


	<form action="" class="container booking" name="booking">
		<div class="header">
			<div>
				<h2>Porto Montenegro</h2>
				<div class="icon"></div>
				<p>Tivat, Montenegro</p>
			</div>
		</div>
		
		<div class="dates" data-type="none">
			<label for="checkin">Check in</label>
			<div class="input-text">
				<input type="datetime" value="9 July, 2016" id="checkin" readonly>
				<div class="icon pop-up"></div>
			</div>

			<label for="checkout">Check out</label>
			<div class="input-text">
				<input type="datetime" value="16 July, 2016" id="checkout" readonly>
				<div class="icon pop-up"></div>
			</div>

			<div class="div-chck">
				<input type="checkbox" id="check">
				<div class="icon input-text"></div>
				<label for="check" class="checkbox">Flexible dates</label>
			</div>
		</div>
		
		<ul class="persons">
			<li>
				<label>Adults</label>
				<div class="input-text">
					<select name="adults">
						<option value="1">1</option>
						<option value="2" selected="selected">2</option>
						<option value="3">3</option>
						<option value="4">4</option>   
					</select>
					<div class="icon"></div>
				</div>
			</li>
			<li>
				<label>Children</label>
				<div class="input-text">
					<select name="children">
						<option value="0">0</option>
						<option value="1" selected="selected">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>   
					</select>
					<div class="icon"></div>
				</div>
			</li>
		</ul>

		<button class="button-big" id="search"><div class="icon"></div>Search rooms</button>
	</form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
	<script>
		$(document).ready(function(){
 $('.pop-up').on('click', function(){
 	$('#overlay').fadeIn(300); 
 	$('.calendar').fadeIn(300); 
 	let clickedbutton = $("input",$(this).parent()).attr('id');
 	$('.dates').data('type',clickedbutton);
 });
 
 $('table').on('click', function(event){
   let that=$(event.target);
    if(that.is('td') && !that.hasClass('notCurMonth') && !that.hasClass('holiday') && !that.hasClass('curDay')){
    	$('td.curDay').toggleClass('curDay');
    	that.toggleClass('curDay');
    }
}); 

$('#add_event').on('click', function(){
	let value= $('td.curDay').html();
    $('#overlay').fadeOut(300);
 	$('.calendar').fadeOut(300);
 	let id=($('.dates').data()).type;
 	$('#' + id).val(value+" May, 2014");
}); 

$('#search').on('click', function(e){
	$('.booking').addClass('is-sent');
	e.preventDefault();
});
});	
	</script>

  </body>

</html>
