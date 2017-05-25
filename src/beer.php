<?php
session_start();
require_once "model/db_functions.php";
require "model/cartItems.php";

if (isset($_POST['addItem']) && isset($_GET['itemType'])) {
	if ($_GET['itemType'] == 1) {
		header('Location: beer.php?itemType=1');
	} elseif ($_GET['itemType'] == 2) {
		header('Location: beer.php?itemType=2');
	} elseif ($_GET['itemType'] == 3) {
		header('Location: beer.php?itemType=3');
	} elseif ($_GET['itemType'] == 4) {
		header('Location: beer.php?itemType=4');
	}
}
?>

<!-- The stript for the header -->
<?php require 'view/header.php'; ?>



<div id="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-6 col-md-2 col-md-offset-1" style="border: 1px solid black;">
      <div class="row">

        <div class="col-sm-10 well">
          <!-- could put a search form here is wanted -->
              <form action="" method="post">
              <button class="btn btn-info btn-lg" name = "seshReset" type="submit" value="1"  style="width: 175px;"> Reset Session </button>
            </form><br>
              <form action="" method="get">
              <button class="btn btn-info btn-lg" name = "itemType" type="submit" value="1" style="width: 175px;"> Ale </button>
              </form><br>
              <form action="" method="get">
              <button class="btn btn-info btn-lg" name = "itemType" type="submit" value="2" style="width: 175px;"> Lager </button>
              </form><br>
              <form action="" method="get">
              <button class="btn btn-info btn-lg" name = "itemType" type="submit" value="3" style="width: 175px;"> Stout </button>
              </form><br>
              <form action="" method="get">
              <button class="btn btn-info btn-lg" name = "itemType" type="submit" value="4" style="width: 175px;"> IPA </button>
              </form>


        </div>

    </div>
  </div>

    <div class="col-xs-12 col-sm-6 col-md-8" style="border: 1px solid black;">
      <?php
        if (isset($_GET['itemType'])){
  			  $count = 0;
      		$items = getProdInfo($_GET['itemType']);
      		foreach ($items as $item) {
      			if ($count % 3 == 0) echo '<div class="row">';
  		?>
  				<div class="col-sm-4">
  					<div class="well text-center">
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

      </div> <!-- closes single body row -->
    </div> <!-- closes body container-fluid -->


  </div>
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
