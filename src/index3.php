<?php
session_start();
require_once "model/db_functions.php";
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
</head>

<body>


<div id="header_div">
	<div id="login_div">
		<?php 

		$current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";	
		if (isset ($_SESSION['user']) && $_SESSION['user']['userid'] > 0)
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
    <a href="index.php?hello=true">Beer</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="index.php?hello=false">Gifts</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href=""> Contact </a>

    </div>

</div>


<div class="container text-center">
	<div class="row">
		<div class="col-sm-3 well">
			<!-- could put a search form here is wanted -->
			A spot to put a search form if we want
		</div>
		
		
		
		
		<div class="col-sm-9">
		<?php
			$count = 0;
    		$names = getProdInfo();
    		foreach ($names as $name) {
    			if ($count % 3 == 0) echo '<div class="row">';
		?>
				<div class="col-sm-4">		
					<div class="well">
						<form action = "" method = "post">
    						<fieldset>
                				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#<?php echo $name['prod_id']; ?>">
                				
                				<?php echo $name['company_name'] . "<br>" . $name['prod_name']; ?> <br><br>
                				<img class="img-thumbnail" style = "height:200px; width:200px;" src="<?php echo $name[prod_picture]; ?>"> <br><br> <?php if ($name['prod_package'] != null) { echo $name['prod_package'] . " --- ";} echo "$" . $name['prod_price']; ?></p>
                				
                				</a>
                				
                				<div id="<?php echo $name['prod_id']; ?>" class="collapse">
                					<?php echo $name['prod_description'] . "<br><br>" ?>
                					Quantity:
                					<input type="number" name="quantity" min="1" max="10">
                					<button class="btn btn-info" name = "prod_id" type="submit" value="<?php echo $name['prod_id']; ?>"> Add </button>
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
        
        <?php
            if (isset($_POST['prod_id'])) {
                $quantity = filter_input(INPUT_POST, 'quantity', FILTER_SANITIZE_SPECIAL_CHARS);
	            $product = filter_input(INPUT_POST, 'prod_id', FILTER_SANITIZE_SPECIAL_CHARS);


                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array ();
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
