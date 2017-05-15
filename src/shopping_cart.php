<?php
session_start();
require_once "model/db_functions.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/basecss.css">
<title>the beer shoppe - Camosun ICS Year One Project</title>
</head>

<body>



<div id="header_div">
	<div id="login_div">
	<a href=""> Hello, Sign in </a>  / <a href=""> Cart(#) </a>
    </div>

	<div id="menubar">
    <a href="">Home</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="index.php?hello=true">Beer</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="index.php?hello=false">Gifts</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href=""> Contact </a>

    </div>

</div>

<?php

 	foreach($_SESSION['cart'] as $key => $value) {

	        $items = idSearch($key);

	        foreach ($items as $item){
	        	echo "The product name is " . $item['prod_name'] . "<br>";
	        	echo "The quanitity is $value <br>";
			}
	}

?>


<div id="footer_div">
footer
</div>


</body>
</html>
