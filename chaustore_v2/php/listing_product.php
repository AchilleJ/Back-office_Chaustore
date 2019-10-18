
<?php require_once('../../php/connectDB.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>
	<h1>Chaustore Products</h1>
	<?php
	session_start();
	if (isset($_SESSION["firstname"])) {
		echo ("<h2>"."Welcome"." ".$_SESSION["firstname"]."</h2>");
	}  
	?>
		<table class="table_stock">
			<thead>
				<tr>
					<th><a href="index.php">Retour</a></th>
				</tr>
				<tr>
					<th>Product</th>
					<th>Brand</th>
					<th>Category</th>
					<th>Price</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql = "SELECT distinct
							product.name as productname,
							brand.name as brandname,
							category.name as categoryname,
							product.price
							FROM product,stock,category,brand
							WHERE stock.product_id=product.id
							AND product.brand_id=brand.id
							AND product.category_id=category.id
							order by product.name";

					$product_result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
					while ($row_product = mysqli_fetch_row($product_result)) {

						$sql_sum_stock = "SELECT sum(stock)
										 from stock
										 INNER JOIN product
										 on stock.product_id = product.id
										 where name = \"$row_product[0]\"";  // le \" designe le caractère "

						$result_sum_stock = mysqli_query($conn,$sql_sum_stock) or die (mysqli_error($conn));
						$row_sum_stock = mysqli_fetch_row($result_sum_stock);

						echo "<tr>";
						for ($i=0; $i <count($row_product) ; $i++) { 
							echo "<td>$row_product[$i]</td>";	
						}

						if ($row_sum_stock[0] > 10){
							echo "<td>disponible</td>";
						}
						elseif ($row_sum_stock[0] <= 10 && $row_sum_stock[0] > 0) {
							echo "<td>bientot épuisé</td>";
						}
						elseif ($row_sum_stock[0] == 0) {
							echo "<td>indisponible</td>";
						}

						echo '</tr>';
					}
				?>
			</tbody>
		</table>

</body>
</html>