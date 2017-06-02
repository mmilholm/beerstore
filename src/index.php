
<?php
session_start();
require_once "model/db_functions.php";
require "model/cartItems.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>the beer shoppe - Camosun ICS Year One Project</title>


	<!-- General CSS scripts
	<link rel="stylesheet" type="text/css" href="css/basecss.css">  -->

	<!-- Bootstrap Core CSS -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

    <!-- For shopping_cart.js -->
    <script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="../shopping_cart.js"></script>


    <!-- Link for font -->
    <link href="https://fonts.googleapis.com/css?family=Share" rel="stylesheet">

<style>
body {
	font-family: 'Share', cursive;

}

.navbar-right > li > a {
		padding-top: 0px;
		padding-bottom: 0px;
}


.navbar {

		position: relative;
		margin-bottom: 0;
		min-height:28px;
}
</style>
</head>

<!-- The stript for the header -->
<?php require 'view/header.php'; ?>

<div id="container-fluid" style="border: 1px solid black;height: 500px;"> <!-- Center of page between header and footer -->
<div id ="row">

<div class="col-md-12" style="border: 1px solid red;background-color: red;">
  <div id="mycarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
      <li data-target="#mycarousel" data-slide-to="1"></li>
      <li data-target="#mycarousel" data-slide-to="2"></li>
      <li data-target="#mycarousel" data-slide-to="3"></li>
      <li data-target="#mycarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item">
          <img src="dbImages/ad1.png" data-color="lightblue" alt="First Image">
          <div class="carousel-caption">

          </div>
      </div>
      <div class="item">
          <img src="dbImages/ad2.png" data-color="firebrick" alt="Second Image">
          <div class="carousel-caption">

          </div>
      </div>
      <div class="item">
          <img src="dbImages/ad3.png" data-color="violet" alt="Third Image">
          <div class="carousel-caption">

          </div>
      </div>
      <div class="item">
          <img src="dbImages/ad4.png" data-color="lightgreen" alt="Fourth Image">
          <div class="carousel-caption">

          </div>
      </div>
      <div class="item">
          <img src="dbImages/ad5.png" data-color="tomato" alt="Fifth Image">
          <div class="carousel-caption">

          </div>
      </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#mycarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#mycarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</div> <!-- end of row -->


</div> <!-- end of center div -->









<div id="footer_div" style="border: 1px solid black;">
footer
</div>

<script>
var $item = $('.carousel .item');
var $wHeight = $(window).height() / 1.5;
$item.eq(0).addClass('active');
$item.height($wHeight);
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height() / 1.5;
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 6000,
  pause: "false"
});
</script>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
