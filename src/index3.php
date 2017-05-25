<?php
session_start();
require_once "model/db_functions.php";
require "model/cartItems.php";

if (isset($_POST['addItem'])) {	
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $product = unserialize($_POST['product_item']);
    cartItems( unserialize($_POST['product_item']), $quantity); 
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


<div class="container text-center">
	<div class="row">
		<div class="col-sm-3 well">
			<!-- could put a search form here is wanted -->
			    <form action="" method="post">
					<button class="btn btn-info" name = "seshReset" type="submit" value="1"> Reset Session </button>
				  </form>

		</div>




		<div class="col-sm-9">
		<?php

			$count = 0;
    		$items = getAllProducts(); 	
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
                					<?php
                						$serialized_item = serialize($item);
                						$encoded=htmlentities($serialized_item);
 										echo '<input type="hidden" name="product_item" value="'.$encoded.'">';
                					?>
                					<input type="number" name="quantity" min="1" max="10">                					         			
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
		</div>

	</div>
</div>

       






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