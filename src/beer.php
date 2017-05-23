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

	<link rel="stylesheet" type="text/css" href="css/basecss.css">

	<title>the beer shoppe - Camosun ICS Year One Project</title>

	<!-- Bootstrap Core CSS -->
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    +    <!-- For shopping_cart.js -->
<script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="shopping_cart.js"></script>

</head>

<body>


<div id="header_div">
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
	   <a href=""> Cart(#) </a>
    </div>

	<div id="menubar">
    <a href="">Home</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="beer.php">Beer</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="merch.php">Gifts</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="contact.php">Contact</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;


    </div>

</div>


<div class="container text-center">
	<div class="row">
		<div class="col-sm-3 well">
			<!-- could put a search form here is wanted -->
			    <form action="" method="post">
					<button class="btn btn-info" name = "seshReset" type="submit" value="1"> Reset Session </button>
				  </form>
          <form action="" method="post">
          <button class="btn btn-info" name = "itemType" type="submit" value="1"> Ale </button>
          </form>
          <form action="" method="post">
          <button class="btn btn-info" name = "itemType" type="submit" value="2"> Lager </button>
          </form>
          <form action="" method="post">
          <button class="btn btn-info" name = "itemType" type="submit" value="3"> Stout </button>
          </form>
          <form action="" method="post">
          <button class="btn btn-info" name = "itemType" type="submit" value="4"> IPA </button>
          </form>

		</div>




		<div class="col-sm-9">
		<?php
      if (isset($_POST['itemType'])){
			  $count = 0;
    		$items = getProdInfo($_POST['itemType']);
    		foreach ($items as $item) {
    			if ($count % 3 == 0) echo '<div class="row">';
		?>
				<div class="col-sm-4">
					<div class="well">
						<form action = "" method = "post">
    						<fieldset>
                				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $item['prod_id']; ?>">

                				<?php echo $item['company_name'] . "<br>" . $item['prod_name']; ?>
                				<br><br> <img class="img-thumbnail" style = "height:200px; width:200px;" src="<?php echo $item[prod_picture]; ?>">
                				    <br><br> <?php if ($item['prod_package'] != null) { echo $item['prod_package'] . " --- ";} echo "$" . $item['prod_price']; ?></p>

                				</a>

                				<div id="<?php echo $item['prod_id']; ?>" class="collapse">
                					<?php echo $item['prod_description'] . "<br><br>" ?>
                					Quantity:
                					<input type="number" name="quantity" min="1" max="10">
                					<input type="hidden" name="prod_id" value="<?php echo $item['prod_id']; ?>">
                					<input type="hidden" name="price" value="<?php echo $item['prod_price']; ?>">
                					<button class="btn btn-info" name = "addItem" type="submit"> Add </button>
            					</div>
            				</fieldset>
        				</form>
        			</div>
				</div>

		<?php
			$count++;
			if ($count % 3 == 0) echo '</div>';
			}
		?>
    <?php
    }
    ?>
		</div>

	</div>
</div>

        <?php
            $getUserID = 0;

                if (isset($_POST['seshReset'])){
                    session_unset();
                    exit();
                }
                if (isset($_POST['addItem'])) {

            	    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
	            	$product = filter_input(INPUT_POST, 'prod_id', FILTER_VALIDATE_INT);
	            	$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

            	    cartItems($quantity, $product, $price);
	        	}



/*

        	//print_r($_SESSION['user']);

            	if (isset($_POST['prod_id'])) {
                	$quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_SPECIAL_CHARS);
	            	$product = filter_input(INPUT_POST, 'prod_id', FILTER_SANITIZE_SPECIAL_CHARS);


                	if (!isset($_SESSION['cart'])) {
                    	$_SESSION['cart'] = array ();
                	}
					//If an order has already been created, add the product to the order
                    //if (isset($_SESSION['order_created'])){
                      // Get the order id
                      //$ordID = getOrderID($_SESSION['user']['user_id']);
                      // Add item call here
                    //}

                    //If an order has not been created yet, create one and add the item to the order
                    if (!isset($_SESSION['order_created'])){
                      $_SESSION['order_created'] = true;

                      if(isset($_SESSION['user']['user_id'])){
                        $getUserID = $_SESSION['user']['user_id'];
                        createOrder($getUserID);
                        //Get order ID
                        //$ordID = getOrderID($_SESSION['user']['user_id']);
                        //Add item call here
                      }
                    }
 	            	if (array_key_exists($product, $_SESSION['cart']))
 	            	{
 		            	$quantity += $_SESSION['cart'][$product];
 		            	$_SESSION['cart'][$product] = $quantity;
 	            	}
 	            	else
 	            	{
 		            	$_SESSION['cart'][$product] = $quantity;
 	            	}


 	            	foreach($_SESSION['cart'] as $key => $value) {
	                	echo "The product id is $key <br>";
	                	echo "The quantity is $value <br><hr>";
	            	}
	        	}
*/
        ?>



<div id="footer_div">
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
