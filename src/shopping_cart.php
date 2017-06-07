<?php
session_start();
require_once "model/db_functions.php";
require "model/cartItems.php";

if (isset($_POST['plusOne']))
{
  $_SESSION['cart'][$_POST['prod_id']]['quantity']++;
  $_SESSION['cart'][$_POST['prod_id']]['subtotal'] = $_SESSION['cart'][$_POST['prod_id']]['quantity'] * $_POST['prod_price'];
}

if (isset($_POST['minusOne']))
{
  $_SESSION['cart'][$_POST['prod_id']]['quantity']--;
  $_SESSION['cart'][$_POST['prod_id']]['subtotal'] = $_SESSION['cart'][$_POST['prod_id']]['quantity'] * $_POST['prod_price'];
  if ($_SESSION['cart'][$_POST['prod_id']]['quantity'] < 1)
    unset($_SESSION['cart'][$_POST['prod_id']]);
}
if (isset($_POST['delete']))
{
  echo $prod_id;
  unset($_SESSION['cart'][$_POST['prod_id']]);
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

	<style>

		body {
			font-family: 'Share', cursive;
		}

		.navbar-right > li > a {
  			padding-top: 0px;
  			padding-bottom: 0px;
 		}


		.navbar {
 			background: aqua;
   			position: relative;
    		margin-bottom: 0;
    		min-height:28px;
		}

        /*  Shopping cart products table css */

		th {
            text-align: center;
            font-size: 22px;
        }

        .cartQuantity {
             padding: 7px;
             font-weight: bold;
             vertical-align: center;
             font-color: ;
        }


        .emptyCartBtn {
            text-align:right;
            padding:10px;
        }

        table.vertical-align > tbody > tr > td {
            vertical-align: middle;
            text-align: center;
            font-size: 18px;
        }

        /* Checkout total table css */
        td {
            text-align: left;
            font-size: 18px;
        }

        .checkout-btn {
            text-align:right;
            padding:10px;
        }

        tr.warning {
            font-weight:bold;
        }

        .products-border {
            border-style: solid;
            border-color: grey;
            border-width: 0px;
            border-right-width: 4px;
        }


	</style>
</head>

<!-- The stript for the header -->
<?php require 'view/header.php'; ?>


<div>
	<div class="row">
    	<div class="col-xs-12 col-sm-6 col-md-9 products-border">
      		<div class = "row">
      		    <div class="col-12">
      		        <table class="table table-striped vertical-align">

                        <tr>
                            <th> </th>
                            <th> Product </th>
                            <th> Price </th>
                            <th> Quantity </th>
                            <th> Total </th>
                            <th> Remove </th>
                        </tr>

        		        <?php
		  			        if (!isset($_SESSION['cart'])) {
        				        echo "Your cart is empty. If you want to drink beer you need to buy beer!";
    	  			        }
                            else
                            {

            			        $cartItem = 0;

            			        //Iterate through the current cart session
            			        foreach($_SESSION['cart'] as $key => $value) {
                			        //Quere the DB for the info related to the prod_id
                			        $product = getProduct($key);
                        ?>

                        	    <tr>
                                  <form action="/shopping_cart.php" method="post">
                                		<td>
                                  			<img class="img-thumbnail" style = "height:100px; width:100px;" src="<?php echo $product[prod_picture]; ?>">
                                		</td>
                                		<td>
            				                <?php echo $product['company_name'] . "<br> " . $product['prod_name'] . "<br> "; ?>
            				            </td>
            				            <td>
            				                <?php echo "$" . $product['prod_price']; ?>
            				            </td>
            				            <td>
            				                <button class="btn btn-success btn-xs" name="plusOne" type="submit" ><div class="glyphicon glyphicon-plus" ></div></button>

                                      	     <span class="cartQuantity"><?php echo $_SESSION['cart'][$product['prod_id']]['quantity']?></span>


                                      	    <button class="btn btn-warning btn-xs" name="minusOne" type="submit"><div class="glyphicon glyphicon-minus"></div></button>
            				            </td>
            				            <td>
            				                 <?php echo "$" . number_format($_SESSION['cart'][$product['prod_id']]['quantity'] * $product['prod_price'], 2); ?>
            				            </td>
            				            <td>
            				                <button class="btn btn-danger" name="delete" type="submit"><div class="glyphicon glyphicon-trash"></div></button>
            				            </td>

            				            <input type="hidden" name="prod_id" id="prod_id" value="<?php echo $product['prod_id'] ?>">
                                         <input type="hidden" name="prod_price" id="prod_price" value="<?php echo $product['prod_price'] ?>">
            				      </form>
                        		</tr>


                        <?php
                                }
                            }
                        ?>

      			      </table>
      			</div>
      		</div>

      		<div class= "row">
      			<div class= "col-xs-12">

                    <form class="emptyCartBtn" action="/shopping_cart.php" method="post">
                        <button class="btn btn-default btn-xs" name="empty" type="submit">EMPTY CART </button>
                    </form>

                </div>
            </div>
    	</div> <!-- end of first content area -->

        <div class="col-xs-12 col-sm-6 col-md-3 text-center">


            <h2>Checkout</h2>


            <?php
          	    define("TAX", 0.07);
          	    $subtotal = 0.0;
                if (isset($_SESSION['cart']))
                {
              	    foreach ($_SESSION['cart'] as $product)
              		{
                        $subtotal += $product['subtotal'];
                    }
                  $subtotal = number_format($subtotal, 2);
                  $taxes = number_format(($subtotal * TAX), 2);
            	  $total = number_format(($subtotal + $taxes), 2);
                }

            ?>

            <table class="table">
                <tr>
                    <td> Subtotal: </td>
                    <td> <?php echo "\$$subtotal" ?> </td>
                </tr>
                <tr>
                    <td>Taxes: </td>
                    <td> <?php echo "\$$taxes" ?> </td>
                </tr>
                <tr class="warning">
                    <td>Cart Total: </td>
                    <td> <?php echo "\$$total" ?> </td>
                </tr>

            </table>



           <!-- echo "Subtotal price: \$$subtotal <br>";
                  echo "Taxes: \$$taxes <br><hr>";
                  echo "Total: \$$total <br><br>"; -->


			    <div class="checkout-btn"><?php require 'checkout.php'; ?> </div>
            <br>

        </div> <!-- end of second content area -->
    </div> <!-- closes single body row -->
</div> <!-- closes body container-fluid -->





<?php
	if(isset($_POST['empty'])) {
	    unset($_SESSION['cart']);
	}
?>

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
