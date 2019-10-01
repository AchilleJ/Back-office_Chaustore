<?php require_once('connectDB.php'); ?>

	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	    <meta charset="utf-8">
	    <link rel="stylesheet" type="text/css" href="../style/style.css">
	</head>
	<body class="body_view">
		<?php
		$choix = $_POST["choix"];
		$choix = strtolower($choix)  // mettre en minuscule, car le nom de la table est en minuscule
		?>
		<h1>View <?php echo $choix ?></h1>
		<h2>Here is the list of <?php echo $choix."s" ?>:</h2>
		<table class="table_product">
			<thead>
				<tr>
					<th><a href="../index.php">Retour</a></th>
				</tr>
				<tr>
					<th>Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Color</th>
					<th>Price</th>
					<th>Gender</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT product.name as product_name,
							category.name as category_name,
							brand.name as brand_name,
							color.name as color_name,
							product.price as price,
							product.gender as gender
							FROM product,color,brand,category
							WHERE product.category_id=category.id
							AND product.color_id=color.id
							AND product.brand_id=brand.id
							ORDER BY product.id;"; 

					$result = mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_row($result)) {
						echo "<tr>";
						for ($i=0; $i <count($row) ; $i++) { 
							echo "<td>$row[$i]</td>";	
						}
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
	</body>
	</html>