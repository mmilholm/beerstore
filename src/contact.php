
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

	</style>
</head>

<!-- The stript for the header -->
<?php require 'view/header.php'; ?>

<div id="container-fluid"> <!-- Center of page between header and footer -->

<div class="col-md-5">
Main Offices
<hr>
4461 Interurban rd<br>
Victoria, British Columbia<br>
V9E 2C1<br>
Technologies Building Rm 259<br><br>
Phone: (250)363-2000<br><br>
Email: contactus@beerstore.ics199.site
</div>
<div class="col-md-5">
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2223.536048523393!2d-123.41626982388019!3d48.49019593039498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sca!4v1496060689490" width="600" height="450" frameborder="0" style="border:0"></iframe>
</div>


</div> <!-- end of center div -->









<?php require 'view/footer.php'; ?>




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
