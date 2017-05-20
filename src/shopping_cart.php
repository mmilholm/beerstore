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
    
    <!-- For shopping_cart.js -->
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


<h1> Shopping Cart!!! </h1>
<hr>

<?php
    //Iterate through the current cart session
    foreach($_SESSION['cart'] as $key => $value) {
        //Quere the DB for the info related to the prod_id
        $product = getProduct($key);
        foreach ($product as $item) {
?>

            <img class="img-thumbnail" style = "height:200px; width:200px;" src="<?php echo $item[prod_picture]; ?>">
<?php       echo $item['company_name'] . " " . $item['prod_name'] . " " . $item['prod_price'];
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
	
       
        <input type="number" name="quantity"  id="quantity<?php echo $item['prod_id'] ?>" value="<?php echo $quantity ?>" min="1" max="10">
        <input type="text" id="subTotal<?php echo $item['prod_id'] ?>" value="<?php echo $price ?>" readonly>
        <input type="hidden" id="price<?php echo $item['prod_id'] ?>" value="<?php echo $item['prod_price']?>">
        <input type="hidden" id="prod_id" value="<?php echo $item['prod_id'] ?>">
		<script> updateSubTotal(<?php echo $item['prod_id'] ?>) </script>
<?php

	}

?>










<div id="footer_div">
footer
</div>


</body>


</html>
