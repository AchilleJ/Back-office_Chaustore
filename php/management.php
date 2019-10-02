<!DOCTYPE html>
<html>
<head>
	<title></title>
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<?php
	$Choix = $_POST["choice"];
	echo '<h1>'.$Choix.' '.'management'.'</h1>';?>
	<h2>Add, modify or delete:</h2>

	<div class="forms">

	<!-- forms for other table -->
	<?php if ($Choix == "Brand" || $Choix == "Color" || $Choix == "Size" || $Choix == "Category") { ?>
	    <form class="forms_submit" method="post" action="add_other.php" id="add">
	    	<input type="hidden" name="choix" value="<?php echo $Choix;?>"> <!-- formulaire caché pour créer une variable avec une valeur qui est le choix transmis parmis les 4 -->	    	
	        <input name="other" type="submit" value="Add">
	    </form>

	    <form class="forms_submit" method="post" action="modify_other.php" id="modify">
	    	<input type="hidden" name="choix" value="<?php echo $Choix;?>">
	        <input name=other type="submit" value="Modify">
	    </form>
	    <form class="forms_submit" method="post" action="delete_category_brand_color.php" id="delete">
	        <input name="delete" type="submit" value="Delete">
	        <input type="hidden" name="choix" value="<?php echo $Choix;?>">
	    </form>

	<?php } ?>

	<!-- forms for product -->
 	<?php if ($Choix == "Product") { ?>
	 		<form class="forms_submit" method="post" action="add_product.php" id="add">
	 			<input type="hidden" name="choix" value="<?php echo $Choix;?>">
		        <input name="Product" type="submit" value="Add">
		    </form>

		    <form class="forms_submit" method="post" action="modify_product.php" id="modify">
		    	<input type="hidden" name="choix" value="<?php echo $Choix;?>">
		        <input name="Product" type="submit" value="Modify">
		    </form>
		    <form class="forms_submit" method="post" action="delete_product.php" id="delete">
		        <input name="delete" type="submit" value="Delete">
		        <input type="hidden" name="choix" value="<?php echo $Choix;?>">
		    </form>
		   	<form class="forms_submit" method="post" action="view_product.php" id="view">
		        <input name="view" type="submit" value="View">
		        <input type="hidden" name="choix" value="<?php echo $Choix;?>">
		    </form>
	<?php } ?>

	<!-- forms for stock -->
	<?php if ($Choix == "Stock") { ?>
		<form class="forms_submit" method="post" action="add_stock.php" id="add">
			<input type="hidden" name="choix" value="<?php echo $Choix;?>">
	        <input name="Stock" type="submit" value="add">
	    </form>

	    <form class="forms_submit" method="post" action="modify_stock.php" id="modify">
	    	<input type="hidden" name="choix" value="<?php echo $Choix;?>">
	        <input name="Stock" type="submit" value="Modify">
	    </form>
	    <form class="forms_submit" method="post" action="toto" id="delete">
	        <input name="delete" type="submit" value="Delete">
	        <input type="hidden" name="choix" value="<?php echo $Choix;?>">
	    </form>
		<form class="forms_submit" method="post" action="view_stock.php" id="view">
		    <input name="view" type="submit" value="View">
		    <input type="hidden" name="choix" value="<?php echo $Choix;?>">
		</form>
	<?php } ?>

	</div>
	<input type="button" value="Retour" onclick="history.back()">
	
</body>
</html>
