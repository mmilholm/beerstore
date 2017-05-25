<?php
/********

 Uncomment when working on header.php

 ***********/
//session_start();
//require_once "../model/db_functions.php";
//require "../model/cartItems.php";

function signIn ()
{
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (isset ($_SESSION['user']) && isset($_SESSION['user']['user_id']))
    {
      echo '<li style=padding-top:5px;>Hello, ' . $_SESSION['user']['first_name']. ' ' .$_SESSION['user']['last_name']. '</li> <li> <a href="../logout.php?origin=' . $current_url . '"><span class="glyphicon glyphicon-user"></span>Log out</a></li>';
    }
    else
    {
      echo '<a href="../login.php?origin='. $current_url . '"><span class="glyphicon glyphicon-user"></span> Hello, Sign in </a>';
    }
}
?>

<nav class="navbar">
	<div class="container-fluid">
			<ul class="nav navbar-nav navbar-right">
    			<li><a href="../shopping_cart.php"> Checkout <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"  style= padding-right:5px;></span><span class="badge"><?php echo getNumberItems() ?> Items</span> </a></li>
    			<li><?php signIn() ?></li>
  			</ul>
  	</div>
</nav>




<div id="container-fluid"> <!-- whole page width-->

    <div class="row" style="background-color: cyan;">
      <div class="col-md-3"></div>
      <div class="col-md-2"><a href="../index3.php" style="font-size: 30px;">Home</a></div>
      <div class="col-md-2"><a href="../beer.php" style="font-size: 30px;">Beer</a></div>
      <div class="col-md-2"><a href="../merch.php" style="font-size: 30px;">Gifts</a></div>
      <div class="col-md-2"><a href="../contact.php" style="font-size: 30px;">Contact</a></div>
      <div class="col-md-2"></div>
      <div class="col-md-2"></div>

    </div>

</div>
