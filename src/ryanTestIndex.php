<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/basecss.css"/>
<title>the beer shoppe - Camosun ICS Year One Project</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$beerType = 0;
$resultSet = [];
</script>
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

<div id="body_div">

<!-- Make the display window go away when the size of the window is a certain screen width to accomodate for mobile devices -->

<!-- Generate the following code when Beer is clicked -->
	<div id="product_display">
    product display area - When window is small enough, this can be hidden to support mobile
    </div>

<!-- For every item in the database, based on the type of beer you select at the top, have php generate a chunk of code (and insert into page?) preformatted with a search of the chosen type, when you click the item, it opens the details in the product display area, where you can select quantity -->
    <div id="product_list">
		<div id="prod_list_links">
    	<a href="javascript:$beerType = 1; searchScript()">Ale</a>
    	<a href="javascript:$beerType = 2; searchScript()">Lager</a>
    	<a href="javascript:$beerType = 3; searchScript()">Stout</a>
    	<a href="javascript:$beerType = 4; searchScript()">IPA</a><br />
		</div>

    		<div id="product_search_results">

        	</div>
    	</div>
		<!-- End of generated code for Beer -->
</div>

<div id="footer_div">
footer
</div>

			<script type="text/javascript">
			function searchScript(){
				$("#product_search_results").html("");
				$type = $beerType;

  				$.ajax({
    				url:'ryanTestSearch.php', //the page containing php script
    				type: 'POST', //request type
						data: {type: $type},
						datatype: 'json',
    				success:function(data){
							$resultSet = JSON.parse(data);
							for (var i = 0; i < $($resultSet).length; i++){
								$prod_img = $resultSet[i].prod_picture;
								$prod_name = $resultSet[i].prod_name;
								$prod_desc = $resultSet[i].prod_description;
								$prod_price = $resultSet[i].prod_price;

								$('#product_search_results').append('<p id="product_output" style="float:left"><img src="dbImages/'+ $prod_img +'"/><br/>'+ $prod_name +'<br/>'+ $prod_desc +'<br/>'+ $prod_price +'</p>');

							}
						}
  				});
				}
			</script>
</body>
</html>
