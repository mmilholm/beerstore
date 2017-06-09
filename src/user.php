<?php
session_start();
require_once "model/db_functions.php";
require "model/cartItems.php";

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

	<style>
 .acctinfo {
	 font-weight: bold

 }
	</style>


</head>

<!-- The stript for the header -->
<?php require 'view/header.php'; ?>



<div class="container-fluid">

	<div class="row">
		<div class="col-lg-12" style="height: 500px;">
			<?php
				if (isset ($_SESSION['user']) && isset($_SESSION['user']['user_id'])){
					echo '<fieldset><legend>User Details</legend><div class="acctinfo">';
					echo 'First Name: ';
					echo $_SESSION['user']['first_name'];
					echo '<br><br>';
					echo 'Last Name: ';
	        echo $_SESSION['user']['last_name'];
					echo '<br><br>';
					echo 'Phone Number: ';
	        echo $_SESSION['user']['phone'];
					echo '<br><br>';
					echo 'Email: ';
	        echo $_SESSION['user']['email'];
					echo '<br><br>';
					echo 'Address: ';
	        echo $_SESSION['user']['address'];
					echo '<br><br>';
					echo 'Postal Code: ';
	        echo $_SESSION['user']['postal_code'];
					echo '<br><br>';
					echo 'City: ';
	        echo $_SESSION['user']['city'];
					echo '<br><br>';
					echo 'Country: ';
	        echo $_SESSION['user']['country'];
					echo '</div></fieldset>';

				}
				else{
					echo '<div class="container text-center"><h1>You are not currently logged in </h1></div>';
				}
			?>
		</div>
	</div>

</div>




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
