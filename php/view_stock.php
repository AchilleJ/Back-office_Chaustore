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
		<table class="table_stock">
			<thead>
				<tr>
					<th><a href="../index.php">Retour</a></th>
				</tr>
				<tr>
					<th>Product</th>
					<th>Size</th>
					<th>Stock</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT
							product.name as productname,
							size.name as sizename,
							stock.stock
							FROM product,size,stock
							WHERE stock.product_id=product.id
							AND stock.size_id=size.id"; 

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