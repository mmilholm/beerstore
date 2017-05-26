<?php
	require_once('./config.php');
	require_once('./email_configuration.php');
    
	$token  = filter_input(INPUT_POST, 'stripeToken', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'stripeEmail', FILTER_VALIDATE_EMAIL);
	$amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_INT);
	
	$billingName = filter_input(INPUT_POST, 'stripeBillingName', FILTER_SANITIZE_SPECIAL_CHARS);
	$billingAddressLine = filter_input(INPUT_POST, 'stripeBillingAddressLine1', FILTER_SANITIZE_SPECIAL_CHARS);
	$billingAddressZip = filter_input(INPUT_POST, 'stripeBillingAddressZip', FILTER_SANITIZE_SPECIAL_CHARS);
	$billingAddressState = filter_input(INPUT_POST, 'stripeBillingAddressState', FILTER_SANITIZE_SPECIAL_CHARS);
	$billingAddressCity = filter_input(INPUT_POST, 'stripeBillingAddressCity', FILTER_SANITIZE_SPECIAL_CHARS);
	$billingAddressCountry = filter_input(INPUT_POST, 'stripeBillingAddressCountry', FILTER_SANITIZE_SPECIAL_CHARS);
	
	$shippingName = filter_input(INPUT_POST, 'stripeShippingName', FILTER_SANITIZE_SPECIAL_CHARS);
	$shippingAddressLine = filter_input(INPUT_POST, 'stripeShippingAddressLine1', FILTER_SANITIZE_SPECIAL_CHARS);
	$shippingAddressZip = filter_input(INPUT_POST, 'stripeShippingAddressZip', FILTER_SANITIZE_SPECIAL_CHARS);
	$shippingAddressState = filter_input(INPUT_POST, 'stripeShippingAddressState', FILTER_SANITIZE_SPECIAL_CHARS);
	$shippingAddressCity = filter_input(INPUT_POST, 'stripeShippingAddressCity', FILTER_SANITIZE_SPECIAL_CHARS);
	$shippingAddressCountry = filter_input(INPUT_POST, 'stripeShippingAddressCountry', FILTER_SANITIZE_SPECIAL_CHARS);
		
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
	
	sendConfirmationEmail($email);
	
	
	
	/*
	
			'billingName' => $billingName,
			'billingAddressLine' => $billingAddressLine,
			'billingAddressZip' => $billingAddressZip,
			'billingAddressState' => $billingAddressState,
			'billingAddressCity' => $billingAddressCity,
			'billingAddressCountry' => $billingAddressCountry,
			'shippingName' => $shippingName,
			'shippingAddressLine' => $shippingAddressLine,
			'shippingAddressZip' => $shippingAddressZip,
			'shippingAddressState' => $shippingAddressState,
			'shippingAddressCity' => $shippingAddressCity,
			'shippingAddressCountry' => $shippingAddressCountry
	*/
?>


