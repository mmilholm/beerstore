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


?>
