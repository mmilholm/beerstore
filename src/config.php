<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_IKHhjr5HbXqeG78doBuBNX5s",
  "publishable_key" => "pk_test_XHGJJOIpZqlRyFqVIFycVlZO"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>