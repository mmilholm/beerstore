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

<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>    
  </div>
  <div class="navbar-brand"></div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
        <li>
                        <a href="../index3.php" >HOME</a>
                    </li>
                    <li>
                        <a href="../beer.php">BEER</a>
                    </li>
                    <li>
                        <a href="../merch.php">GIFT</a>
                    </li>
                     <li>
                        <a href="../contact.php">CONTACT</a>
                    </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../shopping_cart.php"> Checkout <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"  style= padding-right:5px;></span><span class="badge"><?php echo getNumberItems() ?> Items</span> </a></li>
          <li class="dropdown"><?php echo signIn() ?>
            <ul class="dropdown-menu">
              <li> <a href="../user.php"></span>Account</a></li>
                  <li> <a href="../logout.php?origin=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><span class="glyphicon glyphicon-user"></span>Log out</a></li>
              </ul>
          </li>
    </ul>
  </div>
</nav>


<!-- <nav class="navbar" id="topBar">
	<div class="container-fluid" >
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li><a href="#">Link</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li><a href="#">Separated link</a></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
          <li><a href="../shopping_cart.php"> Checkout <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"  style= padding-right:5px;></span><span class="badge"><?php echo getNumberItems() ?> Items</span> </a></li>
          <li class="dropdown"><?php echo signIn() ?>
            <ul class="dropdown-menu">
              <li> <a href="../user.php"></span>Account</a></li>
                  <li> <a href="../logout.php?origin=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" ?>"><span class="glyphicon glyphicon-user"></span>Log out</a></li>
              </ul>
          </li>
        </ul>
      </div>
			
  	</div>
</nav> -->

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

<!-- <div class="row">
 <div id="container-fluid">

    <div class="row" style="background-color:transparent;">
      <div class="col-md-3"></div>
      <div class="col-md-2"><a href="../index3.php" style="font-size: 30px;">Home</a></div>
      <div class="col-md-2"><a href="../beer.php?prodType=1" style="font-size: 30px;">Beer</a></div>
      <div class="col-md-2"><a href="../merch.php?prodType=2" style="font-size: 30px;">Gifts</a></div>
      <div class="col-md-2"><a href="../contact.php" style="font-size: 30px;">Contact</a></div>
      <div class="col-md-2"></div>
      <div class="col-md-2"></div>

    </div>

  </div>
  </div> -->

