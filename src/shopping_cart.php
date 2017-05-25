<?php
session_start();
 require_once "model/db_functions.php";
 require "model/cartItems.php";

if (isset($_POST['update'])) {
    header ('Location: index3.php');
}

if (isset($_POST['checkout'])) {
    header ('Location: shopping_cart.php');
}

if (isset($_POST['empty'])) {
    header ('Location: shopping_cart.php');
}

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

	
</head>


<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel="stylesheet" type="text/css" href="css/basecss.css">

	<title>the beer shoppe - Camosun ICS Year One Project</title>

	<!-- Bootstrap Core CSS -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

    <!-- For shopping_cart.js -->
    <script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="shopping_cart.js"></script>



</head>

<body>


 <?php require 'view/header.php'; ?> 

<div id="container-fluid">
    <div class="col-md-12 col-sm-12" style="border: 1px solid red;">
        <?php
		  if (!isset($_SESSION['cart'])) 
		  {
        		echo "Your cart is empty";
    	  } 
    	  else 
    	  {
	            $cartItem = 0;

	            //Iterate through the current cart session
	            foreach($_SESSION['cart'] as $key => $item) 
	            {
					printCartItem($item);
	            }
		  }
        ?>
        <div class="row">
          <h2>Checkout</h2>
          <hr>

          <?php
                            echo 'Sub total price: $';
                            $subtotal = 0.0;
                            foreach ($_SESSION['cart'] as $product){
                              $subtotal += $product[1];
                            }
                            echo $subtotal;
                            $taxes = $subtotal * 0.07;
                            echo '<br>';
                            echo 'Taxes: $';
                            echo round($taxes, 2);
                            echo '<hr>';
                            echo 'Total: $';
                            $totalCost = $subtotal + $taxes;
                            echo round($totalCost, 2);
          ?></br>
             <button name="checkout" type="submit" value""> CHECKOUT </button>
             <button name="update" type="submit" value"">  CONTINUE SHOPPING </button>
             <button name="empty" type="submit">EMPTY CART </button>
             <?php
                  if (isset($_POST['checkout']) || isset($_POST['update'])) {

                      unset($_SESSION['cart']);

                      for($i = 0; $i < $cartItem; $i++) {
                      	$quantity = filter_input(INPUT_POST, "quantity$i", FILTER_VALIDATE_INT);
          	            $product = filter_input(INPUT_POST, "prod_id$i", FILTER_VALIDATE_INT);
          	            $price = filter_input(INPUT_POST, "price$i", FILTER_VALIDATE_FLOAT);

                      	cartItems($quantity, $product, $price);
                      }
          	    } elseif(isset($_POST['empty'])) {
	        			unset($_SESSION['cart']);
	    		}

                  ?>

        </div>

  

      </div> <!-- closes single body row -->
    </div>
</div> <!-- closes body container-fluid -->


<?php	
	if (isset($_POST['checkout']) || isset($_POST['update'])) {
		
		unset($_SESSION['cart']);
		
		for($i = 0; $i < $cartItem; $i++) {
            $quantity = filter_input(INPUT_POST, "quantity$i", FILTER_VALIDATE_INT);
          	$product = filter_input(INPUT_POST, "prod_id$i", FILTER_VALIDATE_INT);
          	$price = filter_input(INPUT_POST, "price$i", FILTER_VALIDATE_FLOAT);

            cartItems($quantity, $product, $price);
        }
    } elseif(isset($_POST['empty'])) {
	    unset($_SESSION['cart']);
	}
?>






<div id="popover" style="display: none">
	<a class="btn btn-success" href="#"><span class="glyphicon glyphicon-plus" ></span></a>
	<a class="btn btn-warning" href="#"><span class="glyphicon glyphicon-minus"></span></a>
	<a class="btn btn-danger" href="#"><span class="glyphicon glyphicon-trash"></span></a>
</div>
<script language="javascript" type="text/javascript" >	
	$(function() {
	var pop = $('.popbtn');
	var row = $('.row:not(:first):not(:last)');


	pop.popover({
		trigger: 'manual',
		html: true,
		container: 'body',
		placement: 'bottom',
		animation: false,
		content: function() {
			return $('#popover').html();
		}
	});


	pop.on('click', function(e) {
		pop.popover('toggle');
		pop.not(this).popover('hide');
	});

	$(window).on('resize', function() {
		pop.popover('hide');
	});

	row.on('touchend', function(e) {
		$(this).find('.popbtn').popover('toggle');
		row.not(this).find('.popbtn').popover('hide');
		return false;
	});

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