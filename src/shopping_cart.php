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


<div class="container-fluid">
  <div class="row" style="height: 35px;">
  Some image can go here<br><br><br>
  <div id="login_div">
    <?php

    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (isset ($_SESSION['user']) && isset($_SESSION['user']['user_id']))
    {
      echo 'Hello, ' . $_SESSION['user']['first_name']. ' ' .$_SESSION['user']['last_name']. ' <a href="logout.php?origin=' . $current_url . '">Log out</a>';
    }
    else
    {
      echo '<a href="login.php?origin='. $current_url . '"> Hello, Sign in </a>';
    }
    ?>
     <a href="shopping_cart.php"> Cart(#) </a>
    </div>

  </div>
  </div>
<div id="container-fluid"> <!-- whole page width-->

    <div class="row" style="background-color: cyan;">
      <div class="col-md-3"></div>
      <div class="col-md-2"><a href="index3.php" style="font-size: 30px;">Home</a></div>
      <div class="col-md-2"><a href="beer.php" style="font-size: 30px;">Beer</a></div>
      <div class="col-md-2"><a href="merch.php" style="font-size: 30px;">Gifts</a></div>
      <div class="col-md-2"><a href="contact.php" style="font-size: 30px;">Contact</a></div>
      <div class="col-md-2"></div>
      <div class="col-md-2"></div>

    </div>

</div>

<div id="container-fluid">
  <div class="row">

    <div class="col-xs-12 col-sm-6 col-md-9" style="border: 1px solid black;">

      <table class="table table-striped">
		<form action="/shopping_cart.php" method="post">
        <?php
		  if (!isset($_SESSION['cart'])) {
        		echo "Your cart is empty";
    	  } else {
            $cartItem = 0;

            //Iterate through the current cart session
            foreach($_SESSION['cart'] as $key => $value) {
                //Quere the DB for the info related to the prod_id
                $product = getProduct($key);

                foreach ($product as $item) {
                  ?>

                        <tr>
                          <td>
                            <img class="img-thumbnail" style = "height:100px; width:100px;" src="<?php echo $item[prod_picture]; ?>">
                          </td>

                          <td>

                            <?php       echo $item['company_name'] . "<br> " . $item['prod_name'] . "<br> " . $item['prod_price'];

                            }
                              $isFirst = true;
                              foreach($value as $val) {
                                if ($isFirst) {
                                  $quantity = (int) $val;
                                  $isFirst = false;
                                } else {
                                  $price = $val;
                                }
                              }
                            ?>

                            <br>

                            Quantity:   
                            <!-- Quantity -->
            				<input type="number" name="quantity<?php echo $cartItem ?>"  id="quantity<?php echo $cartItem ?>" value="<?php echo $quantity ?>" min="0" max="10">

           					 <!-- SubTotal -->
            				<input type="text" id="subTotal<?php echo $cartItem ?>" value="<?php echo $price ?>" readonly>

            				<!-- Price of individual product (hidden) -->
            				<input type="hidden" name="price<?php echo $cartItem ?>" id="price<?php echo $cartItem ?>" value="<?php echo $item['prod_price']?>">

            				<!-- The product id (hidden) -->
           					 <input type="hidden" name="prod_id<?php echo $cartItem ?>" id="prod_id" value="<?php echo $item['prod_id'] ?>">
		    				<script> updateSubTotal("<?php echo $cartItem ?>") </script>
		   					 <!-- <script> updateTotal("<?php echo $cartItem ?>") </script>  -->

                            <br/>
                          </td>
                        </tr>



                        <?php
                        $cartItem += 1;

                        }
					}
                        ?>
      </table>
    </div> <!-- end of first content area -->

     <div class="col-xs-12 col-sm-6 col-md-3" style="border: 1px solid black;">
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


          ?></br></br>




             <button name="checkout" type="submit" value""> CHECKOUT </button>
             <button name="update" type="submit" value"">  CONTINUE SHOPPING </button>
             <button name="empty" type="submit">EMPTY CART </button>
           </form>






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

      </div> <!-- end of second content area -->

      </div> <!-- closes single body row -->
    </div> <!-- closes body container-fluid -->


  </div>



<div id="container-fluid" style="border: 1px solid black;height:50px;">
footer
</div>




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
