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
      echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello, ' . $_SESSION['user']['first_name']. ' ' .$_SESSION['user']['last_name']. '<span class="caret"></span></a>';
    }
    else
    {
      echo '<a href="../login.php?origin='. $current_url . '"><span class="glyphicon glyphicon-user"></span> Hello, Sign in </a>';
    }
}
?>


<body>

<nav class="navbar" id="topBar">
	<div class="container-fluid" style="height: 135px;">
			<ul class="nav navbar-nav navbar-right">
    			<li><a href="../shopping_cart.php"> Checkout <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"  style= padding-right:5px;></span><span class="badge"><?php echo getNumberItems() ?> Items</span> </a></li>
    			<li class="dropdown"><?php echo signIn() ?>
    				<ul class="dropdown-menu">
          				<li> <a href="../logout.php?origin=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><span class="glyphicon glyphicon-user"></span>Log out</a></li>
       				</ul>
    			</li>
  			</ul>
  	</div>
</nav>


<?php /*
<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-center">
                    <li>
                        <a href="../index3.php" style="font-size: 30px;">Home</a><
                    </li>
                    <li>
                        <a href="../beer.php" style="font-size: 30px;">Beer</a>
                    </li>
                    <li>
                        <a href="../merch.php" style="font-size: 30px;">Gifts</a>
                    </li>
                     <li>
                        <a href="../contact.php" style="font-size: 30px;">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

*/?>


<div id="container-fluid">

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
