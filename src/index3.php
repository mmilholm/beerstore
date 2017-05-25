<?php
session_start();
require_once "model/db_functions.php";
require "model/cartItems.php";

if (isset($_POST['addItem'])) {
    header ('Location: index3.php');
}

?>


<!-- The stript for the header -->
<?php require 'view/header.php'; ?>




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
		</div>

	</div>
</div>

        <?php
            	if (isset($_POST['addItem'])) {

            	    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
	            	$product = filter_input(INPUT_POST, 'prod_id', FILTER_VALIDATE_INT);
	            	$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

            	    cartItems($quantity, $product, $price);
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
