<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<?php echo '<h1>'.$_POST["choice"].' '.'management'.'</h1>';?>
	<h2>Add, modify or delete:</h2>

	<div class="forms">
	<?php if ($_POST["choice"] == "Brand" || $_POST["choice"] == "Color" || $_POST["choice"] == "Size" || $_POST["choice"] == "Category") { ?>
	    <form method="post" action="add_other.php" id="add">
	        <input name="choice" type="submit" value="Add">
	    </form>

	    <form method="post" action="modify_other.php" id="modify">
	        <input name="choice" type="submit" value="Modify">
	    </form>
	<?php } ?>
 	<?php if ($_POST["choice"] == "Product") { ?>
 		<form method="post" action="add_product.php" id="add">
	        <input name="choice" type="submit" value="Add">
	    </form>

	    <form method="post" action="modify_product.php" id="modify">
	        <input name="choice" type="submit" value="Modify">
	    </form>

	<?php } ?>
	<?php if ($_POST["choice"] == "Stock") { ?>
		<form method="post" action="add_stock.php" id="add">
	        <input name="choice" type="submit" value="Add">
	    </form>

	    <form method="post" action="modify_stock.php" id="modify">
	        <input name="choice" type="submit" value="Modify">
	    </form>	
	<?php } ?>
	
	    <form method="post" action="delete.php" id="delete">
	        <input name="choice" type="submit" value="Delete">
	    </form>
	</div>
	
</body>
</html>
