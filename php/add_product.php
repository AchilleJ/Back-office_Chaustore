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
		<h1>Add <?php echo $choix ?></h1>
		<h2 class="h2_product">Write and select to create a <?php echo $choix ?>:</h2>
		<form method="post" action="add_product.php" id="add_product">
			<p>
				<label for="name">Name:</label>
				<input type="text" name="name">
			</p>
			<p>
				<label for="name">Category:</label>
				<select name="category" form="add_product">
					<?php
					$sql = "SELECT name from category ";
		            $req = mysqli_query($conn,$sql); 
		            while($row = mysqli_fetch_array($req)){		
		        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';	   
		            }
		            mysqli_free_result ($req); 
		            ?>
				</select>
			</p>
			<p>
				<label for="name">Brand:</label>
				<select name="brand" form="add_product">
					<?php
					$sql = "SELECT name from brand ";
		            $req = mysqli_query($conn,$sql); 
		            while($row = mysqli_fetch_array($req)){		
		        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';	   
		            }
		            mysqli_free_result ($req); 
		            ?>
				</select>
			</p>
			<p>
				<label for="name">Color:</label>
				<select name="color" form="add_product">
					<?php
					$sql = "SELECT name from color ";
		            $req = mysqli_query($conn,$sql); 
		            while($row = mysqli_fetch_array($req)){		
		        	   echo '<option value="'.$row[0].'">'.$row[0].'</option>';	   
		            }
		            mysqli_free_result ($req); 
		            ?>
				</select>
			</p>
			<p>
				<label for="name">Price:</label>	
				<input type="number" name="price">
			</p>
			<p>
				<div>
					<input type="radio" name="gender" value="H"> Male </input>
					<input type="radio" name="gender" value="F"> Female </input>
				</div>
			</p>

			<p class="ok_product">
				<input type="submit" name="ok" value="Add">
			</p>
			<input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix dans $_POST (brand,color,size ou category) -->
		</form>

		<a href="../index.php">Retour</a>

		<?php

		$error= "";
		if (isset($_POST['name']) || isset($_POST['price'])) {		//name et price n'existe pas lorsqu' on lance la page donc on rentre dans la condition seulement si on submit (cela créer name et price)

			if ((empty($_POST['name']) || $_POST['name'] ==" ") || (empty($_POST['price']) || $_POST['price'] ==" ")) {										
				$error = "vide";
				?><p class="error">Error, write something please</p><?php
			}
			else{
				$array_id = array(); // tabelau pour stocker les id
				$array_form = array(
				    "category" => $_POST['category'],			//on met les valeur de category brand color recupérer dans un tableau associatif
				    "brand"   => $_POST['brand'],
				    "color"  => $_POST['color'],
				);												//3 colonnes dans pruduct sont des id  donc -->
				foreach ($array_form as $key => $value) {			//pour chaque association dans ce tableau, slectionner l'id correspondant
					$result = mysqli_query($conn,"SELECT id from $key where name = '$value'");
					$row = mysqli_fetch_row($result);
					$array_id[$key][] = $row[0];				// on stock les id dans le tableau				
				}

				$sql = "insert into product (id,name,category_id,brand_id,color_id,price,gender)
				values (NULL,'{$_POST['name']}',{$array_id['category'][0]},{$array_id['brand'][0]},{$array_id['color'][0]},{$_POST['price']},'{$_POST['gender']}')"; // on met par exemple $array_id['category'][0] et pas juste $array_id['category'] car ce dernier ne retourne pas la valeur mais un tableau contenant la valeur, à l'indice 0
				$result = mysqli_query($conn,$sql);

				?><p class="correct">Successful addition</p><?php
			}
		}
		/*
		select * from product inner join color on product.color_id = color.id inner join brand on product.brand_id = brand.id inner join category on product.category_id = category.id order by product.id;
		*/
		?>
