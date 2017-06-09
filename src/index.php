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

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
  <link href="../css/shop-homepage.css" rel="stylesheet">

</head>
<body style="overflow:hidden;">
<!-- The stript for the header -->
  <?php require 'background_video.php'; ?>
  <?php require 'view/header.php'; ?>

	<!-- Latest compiled JavaScript -->
     
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../shopping_cart.js"></script>
</body>
</html>
