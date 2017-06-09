<?php
session_start();
require_once "model/db_functions.php";
require "model/cartItems.php";
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

    <!-- Individual product display CSS  -->
    <link href="../css/individual_product.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

    <!-- For shopping_cart.js -->
    <script data-require="jquery" data-semver="2.1.4" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="../shopping_cart.js"></script>


    <!-- Link for font -->
    <link href="https://fonts.googleapis.com/css?family=Share" rel="stylesheet">




</head>
<?php
   unset($_SESSION["cart"]);

 ?>
<!-- The stript for the header -->
<?php require 'view/header.php'; ?>




      <div class="container-fluid">
        <div class="row">
      <div class="col-lg-4" style=""></div>
      <div class="col-lg-4" style=" border-radius: 25px; background-color: #F9F9F9;">
      <h1> Thank you!</h1><br>
      for shopping at the Beer Shoppe! Please Enjoy Responsibly<br><br>
      <?php
      echo 'Confirmation ';
      sendConfirmationEmail($email);

      echo "<h3>Successfully charged $amount!</h3>";

      echo "<legend>Your beer will be shipped to:</legend> <br>"
          .  "<u>Name</u>: " . $shippingName . '<br>'
          .  "<u>Address</u>: " . $shippingAddressLine . '<br>'
          .  $shippingAddressCity . ", " . $shippingAddressCountry . '<br>'
          .  $shippingAddressZip;


      ?>
      </div>
      </div>
      </div>

<?php
   unset($_SESSION["cart"]);

 ?>




<?php require 'view/footer.php'; ?>

<!-- Script for hover over products for accordian to drop -->
<script>

$(function() {
    $(document).on('mouseenter.collapse', '[data-toggle=collapse]', function(e) {
        var $this = $(this),
            href,
            target = $this.attr('data-target')
                     || e.preventDefault()
                     || (href = $this.attr('href'))
                     && href.replace(/.*(?=#[^\s]+$)/, ''), //strip for ie7
            option = $(target).hasClass('in') ? 'hide' : "show"

            $('.panel-collapse').not(target).collapse("hide")
            $(target).collapse(option);
    })
});
</script>

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
