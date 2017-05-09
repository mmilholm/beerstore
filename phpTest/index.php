<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="basecss.css">
<title>the beer shoppe - Camosun ICS Year One Project</title>
</head>

<body>

<?php require_once "testFunction.php"; 
$product = new Search ();

?>

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

<div id="body_div">

<!-- Make the display window go away when the size of the window is a certain screen width to accomodate for mobile devices -->
	<div id="product_display">
    product display area - When window is small enough, this can be hidden to support mobile
    </div>
    
<!-- For every item in the database, based on the type of beer you select at the top, have php generate a chunk of code (and insert into page?) preformatted with a search of the chosen type, when you click the item, it opens the details in the product display area, where you can select quantity -->
    <div id="product_list">
		<div id="prod_list_links">
    	Ale&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    	Lager&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    	Stout&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    	IPA<br />
        (When you click one of these links, it searches the db for ie. Ale's and uses the query results to display clickable items - WHen items are clicked, their details open in the product display area where you can adjust the quantity and add it to the cart.)
    	</div>
    	<div id="product_search_results">
    	
    	<?php 
    		if ($_GET['hello']) {
    			$product->searchLimit('Inception');
    		}
    		else { 
    			$product->searchLimit('%'); 
    		}
    		
    		$names = $product->getProdName ();
    		foreach ($names as $name) {
    	?>
        <p style="background-color: #C3F; width: 100px; height:100px; margin-left: 20px; margin-top: 50px; float:left; border-radius: 5px;"> <?php echo $name[prod_name]; ?></p>
        
        <?php
        }
        ?>
        
        
        
        
        
        <p style="background-color: #C3F; width: 100px; height:100px; margin-left: 20px; margin-top: 50px; float:left; border-radius: 5px;">Test</p>
        <p style="background-color: #C3F; width: 100px; height:100px; margin-left: 20px; margin-top: 50px; float:left; border-radius: 5px;">When the window size is small, maybe these can have an add to cart / quantity to them</p>
        <p style="background-color: #C3F; width: 100px; height:100px; margin-left: 20px; margin-top: 50px; float:left; border-radius: 5px;">Test</p>
        <p style="background-color: #C3F; width: 100px; height:100px; margin-left: 20px; margin-top: 50px; float:left; border-radius: 5px;">Test</p>
        <p style="background-color: #C3F; width: 100px; height:100px; margin-left: 20px; margin-top: 50px; float:left; border-radius: 5px;">Test</p>
        
        </div>
    </div>
</div>

<div id="footer_div">
footer
</div>


</body>
</html>
