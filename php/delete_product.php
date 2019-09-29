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
		<h1>Delete <?php echo $choix ?></h1>
		<h2 class="h2_product">Select a <?php echo $choix ?> you want to delete:</h2>

		<?php
		if (isset($_POST['product'])) {
			$product_name = $_POST['product'] ;
			$id = mysqli_query($conn,"SELECT id from product where name = '$product_name'");
			$row = mysqli_fetch_row($id);
			mysqli_query($conn,"DELETE from stock where product_id = $row[0]");
			mysqli_query($conn,"DELETE from product where name = '$product_name'");
			?><p class="correct">Successful deletion</p><?php
		}
		?>

		<div class="select">
			<select name="product" form="delete_product">
				<?php
					$sql = "SELECT name from product";
			        $req = mysqli_query($conn,$sql); 
			        while($row = mysqli_fetch_array($req)){		
			        	echo '<option value="'.$row[0].'">'.$row[0].'</option>';	   
			        }
			        mysqli_free_result ($req); 
			    ?>
			</select>
		</div>

		<form method="post" action="delete_product.php" id="delete_product">
			<input type="submit" name="ok" value="Delete">

			<input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix dans $_POST (brand,color,size ou category) -->
		</form>
		<a href="../index.php">Retour</a>

	</body>
	</html>