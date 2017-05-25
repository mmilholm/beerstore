<?php

function cartItems ($quantity, $product, $price) {



    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array ();

    }

 	if (array_key_exists($product, $_SESSION['cart'])) {
        //zero is the location of quantity in the array
 		$quantity += $_SESSION['cart'][$product][0];
 		$_SESSION['cart'][$product][0] = $quantity;
 		$_SESSION['cart'][$product][1] = ($price * $quantity);
 	} else {
 		$_SESSION['cart'][$product] = array($quantity, ($price * $quantity));
 	}
}


function cartItemsG ( $product, $addQuantity) { //Georgi's cartItems

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array ();

    }

 	if (array_key_exists($product['prod_id'], $_SESSION['cart'])) {
        //zero is the location of quantity in the array

 		$_SESSION['cart'][$product['prod_id']]['quantity'] += $addQuantity;

 	} else {
 		$_SESSION['cart'][$product['prod_id']] = $product;
 		$_SESSION['cart'][$product['prod_id']]['quantity'] = $addQuantity;
 	}
}


function getNumberItems() {
	$numItems = 0;

	if (!isset($_SESSION['cart'])) {
		return $numItems;
	}

	foreach(array_keys($_SESSION['cart']) as $key) {
			$numItems += (int) $_SESSION['cart'][$key][0];
	}
	return $numItems;
}

function printCartItem($item){
$productRow = <<<DELIMITER
<div class="row">
<div>
<img  class="img-thumbnail" style = "height:100px; width:100px; float:left" src="{$item['prod_picture']}">
<span class="quantity">{$item['quantity']}</span>
<span class="itemName">{$item['prod_name']}</span>
<span class="popbtn"><a class="arrow"></a></span>
<span class="price">{$item['prod_price']}</span>
</div>
</div>
DELIMITER;
echo $productRow;
}


?>
