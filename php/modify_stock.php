<?php require_once('connectDB.php'); ?>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	    <meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="../style/style.css">
	</head>
	<body>
		<?php
			$choix = $_POST["choix"];
			$choix = strtolower($choix)  // mettre en minuscule, car le nom de la table est en minuscule
		?>
		<h1>Modify <?php echo $choix ?></h1>

		<?php if (isset($_POST["Stock"])) { ?>      <!-- ce formulaire s'affiche seulement au premier lancement de la page -->
			<h2>First step, choose a product:</h2>
			<div class="select">
				<select name="select_product" form="modify_stock">
					<?php
					$sql = "SELECT name from product";
		            $req = mysqli_query($conn,$sql);
		            while ($row = mysqli_fetch_row($req)){	
		        		echo '<option value="'.$row[0].'">'.$row[0].'</option>';	      // on affiche chaque champ
		            } 
		            ?>
				</select>
			</div>
			<form method="post" action="modify_stock.php" id="modify_stock">
				<input type="submit" name="ok" value="ok">

				<input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix dans $_POST (brand,color,size ou category) -->
			</form>
		<?php } ?>


		<?php if (!isset($_POST["select_size"]) && (isset($_POST["select_product"]))) { ?>
			<h2>Second step, choose among the sizes available for this product:</h2>
			<div class="select">
				<select name="select_size" form="modify_stock">
					<?php
					$product_name = $_POST["select_product"];
					$req = mysqli_query($conn,"SELECT id from product where name = '$product_name'");
					$row_id_product = mysqli_fetch_row($req);
					$product_id = $row_id_product[0];

					$sql = "SELECT *
							from stock
							inner join size on stock.size_id = size.id
							where product_id = $product_id
							order by stock.product_id;";

					$name_size = mysqli_query($conn,$sql);
		            while ($row = mysqli_fetch_array($name_size)){	
		        		echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';	      // on affiche chaque champ
		            } 
		            ?>
				</select>
			</div>
			<form method="post" action="modify_stock.php" id="modify_stock">
				<input type="submit" name="ok" value="ok">

				<input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix dans $_POST -->
				<input type="hidden" name="product_id" value="<?php echo $product_id;?>">
			</form>
		<?php } ?>

		<?php if (!isset($_POST["modify_stock"]) && (isset($_POST["select_size"]))) { ?>
			<h2>Final step, write the number of shoes you want to add or delete</h2>

			<form method="post" action="modify_stock.php" id="modify_stock">
				<input type="number" name="number_modify_stock" value="1">
				<input type="submit" name="ok" value="ok">

				<input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix dans $_POST (brand,color,size ou category) -->
				<input type="hidden" name="name_size" value="<?php echo $_POST["select_size"];?>">
				<input type="hidden" name="product_id" value="<?php echo $_POST["product_id"];?>">
			</form>

		<?php }

			if(!empty($_POST["number_modify_stock"])){
				$name_size = $_POST["name_size"]; 
				$req = mysqli_query($conn,"SELECT id from size where name = '$name_size'");
				$row_id_size = mysqli_fetch_array($req);

				$size_id = $row_id_size[0];
				$product_id = $_POST["product_id"];

				$req = mysqli_query($conn,"SELECT stock from stock where size_id = $size_id and product_id = $product_id ");
				$row = mysqli_fetch_array($req);
				$stock = $row[0];
				$new_stock = $stock + $_POST["number_modify_stock"];
				if ($new_stock < 0) {
					$new_stock = 0;
				}

				$sql = "UPDATE stock SET stock = '$new_stock' WHERE stock = '$stock'"; 
				$result = mysqli_query($conn,$sql);
				?><p class="correct">Successful modification</p><?php

			}
			
		?>


		<a href="../index.php">Retour</a>


	</body>
	</html>
