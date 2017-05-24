<?php
	require_once('./config.php');
    
	$token  = filter_input(INPUT_POST, 'stripeToken', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'stripeEmail', FILTER_VALIDATE_EMAIL);
	$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
	
	$customer = \Stripe\Customer::create(array(
			'email' => $email,
			'source' => $token
	));

		
	$charge = \Stripe\Charge::create(array(
	'customer' => $customer->id,
	'amount' => $amount,
	'currency' => 'cad'
	));
	
	$amount = number_format(($amount / 100), 2);
	
	echo "<h1>Successfully charged $amount!</h1>";
?>


