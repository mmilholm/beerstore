<?php

function cartItems ($quantity, $product, $price) {
	
	$newQuantity = 0;
	
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array ();
    }
    
    if (!isset($_SESSION['cart'][$product])) {
 		$_SESSION['cart'][$product] = array ();
 	}
 	
 	$newQuantity = $quantity + $_SESSION['cart'][$product]['quantity'];
 	$_SESSION['cart'][$product]['quantity'] = $newQuantity;
 	$_SESSION['cart'][$product]['subtotal'] = ($price * $newQuantity); 	

    
    
    
    /*
 	if (array_key_exists($product, $_SESSION['cart'])) 
 	{
        //zero is the location of quantity in the array
 		$quantity += $_SESSION['cart'][$product][0];
 		$_SESSION['cart'][$product][0] = $quantity;
 		$_SESSION['cart'][$product][1] = ($price * $quantity); 		
 	} 
 	else 
 	{
 		$_SESSION['cart'][$product] = array($quantity, ($price * $quantity));

 	} 
	*/
}


function getNumberItems() {
	$numItems = 0;

	if (!isset($_SESSION['cart'])) {
		return $numItems;
	}

	foreach(array_keys($_SESSION['cart']) as $prod_id) {
			$numItems += (int) $_SESSION['cart'][$prod_id]['quantity'];
	}
	return $numItems;
}

?>
