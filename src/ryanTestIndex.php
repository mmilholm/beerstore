<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/basecss.css"/>
<title>the beer shoppe - Camosun ICS Year One Project</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$productType = 0;
$pageToLoad = '';
$resultSet = [];
</script>
</head>

<body>




<div id="header_div">
	<div id="login_div">
	<a href="javascript:$pageToLoad = 'userAcct'; pageLoadScript()"> Hello, Sign in </a> /
	<a href="javascript:$pageToLoad = 'cart'; pageLoadScript()"> Cart(#) </a>
    </div>

	<div id="menubar">
    <a href="javascript:$pageToLoad = 'index'; pageLoadScript()">Home</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="javascript:$pageToLoad = 'beer'; pageLoadScript()">Beer</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="javascript:$pageToLoad = 'merch'; pageLoadScript()">Gifts</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    <a href="javascript:$pageToLoad = 'contact'; pageLoadScript()"> Contact </a>

    </div>

</div>

<div id="body_div">



</div>

<div id="footer_div">
footer
</div>



			<script type="text/javascript">
			//Search the db and display the products
			function searchScript(){
				$("#product_search_results").html("");
				$type = $productType;

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

			<script type="text/javascript">
			//Load the page contents in the middle body area based on the link clicked
					function pageLoadScript(){
								$("#body_div").html("");

								switch ($pageToLoad){

									case 'beer':
										$.ajax({
											url: "scripts/beerPage.txt",
											datatype: "html",
											success: function(result){
												$("#body_div").html(result);}});
										break;

									case 'merch':
									$.ajax({
										url: "scripts/merchPage.txt",
										datatype: "html",
										success: function(result){
											$("#body_div").html(result);}});
									break;

									case 'contact':
									$.ajax({
										url: "scripts/contactPage.txt",
										datatype: "html",
										success: function(result){
											$("#body_div").html(result);}});
									break;

									case 'userAcct':
									$.ajax({
										url: "scripts/userAcctPage.txt",
										datatype: "html",
										success: function(result){
											$("#body_div").html(result);}});
									break;

									case 'cart':
									$.ajax({
										url: "scripts/cartPage.txt",
										datatype: "html",
										success: function(result){
											$("#body_div").html(result);}});
									break;

									default:
										$("#body_div").html(indexPage());
										break;
					}
				}
			</script>
</body>
</html>
