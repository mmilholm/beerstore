<?php
session_start();
require_once "model/db_functions.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/basecss.css">

<title>the beer shoppe - Camosun ICS Year One Project</title>
</head>

<body>

<div id="bgndVideo" class="player" data-property="{videoURL:'ekgzCPauXQM',containment:'body', showControls:true, autoPlay:true, loop:true, vol:0, mute:true, startAt:30,ratio:16/9, stopAt:42, opacity:1, addRaster:true, quality:'medium', optimizeDisplay:true}"></div>
<div id="header_div">
	<div id="login_div">
	<a href=""> Hello, Sign in </a>  / <a href=""> Cart(#) </a>
    </div>

	<div id="menubar">
    <a href="">Home</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="index.php?hello=true">Beer</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="index.php?hello=false">Gifts</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href=""> Contact </a>

    </div>

</div>

<div id="body_div">

<!-- Make the display window go away when the size of the window is a certain screen width to accomodate for mobile devices -->
	<div id="product_display">
    product display area - When window is small enough, this can be hidden to support mobile
    </div>

<!-- For every item in the database, based on the type of beer you select at the top, have php generate a chunk of code (and insert into page?) preformatted with a search of the chosen type, when you click the item, it opens the details in the product display area, where you can select quantity -->
    <div id="product_list">
		<div id="prod_list_links">
    	Ale&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    	Lager&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    	Stout&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    	IPA<br />


       <!-- (When you click one of these links, it searches the db for ie. Ale's and uses the query results to display clickable items - WHen items are clicked, their details open in the product display area where you can adjust the quantity and add it to the cart.) -->
    	</div>
    	<div id="product_search_results">

    	<?php
    		$names = getProdInfo();
    		foreach ($names as $name) {
    	?>

        <form action = "" method = "post">
            <fieldset>
                <p> <img style = "height:200px; width:200px;" src="<?php echo $name[prod_picture]; ?>"> <br> <?php echo $name['prod_name']; ?> <br> <?php echo $name['prod_price']; ?></p>
                Quantity:
                <input type="number" name="quantity" min="1" max="10">
                <button name = "prod_id" type="submit" value="<?php echo $name['prod_id']; ?>"> Add </button>
            </fieldset>
        </form>

        <hr>

        <?php
        }
        ?>

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

        </div>
    </div>
</div>

<div id="footer_div">
footer
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="../vendor/YTPlayer/jquery.mb.YTPlayer.js"></script>
</body>
</html>
