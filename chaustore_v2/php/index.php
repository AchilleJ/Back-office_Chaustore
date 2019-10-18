<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h1>Chaustore home page</h1>
	<?php
	session_start();
	if (isset($_SESSION["firstname"])) {
		echo ("<h2>"."Welcome"." ".$_SESSION["firstname"]."</h2>");
	}  
	?>
	<a href="form_register.php">Create account</a>
	<?php
	if (isset($_SESSION["firstname"])) {
		?> <a href="form_connection.php">Deconnection</a> <?php 

	
	} else {
		?> <a href="form_connection.php">Connection</a> <?php 
	}
	//
	?>

	<a href="listing_product.php">list of products</a>

</body>
</html>