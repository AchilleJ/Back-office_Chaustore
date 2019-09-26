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
		<h2>Choose a <?php echo $choix ?> to modify and write a new one:</h2>

		<?php
		$error= "";
		if (isset($_POST['name'])) {		//name n'existe pas lorsqu' on lance la page donc on rentre dans la condition seulement si on submit(cela créer name)

			if (empty($_POST['name']) || $_POST['name'] ==" ") {							
				$error = "vide";
				?><p class="error">Error, write something please</p><?php
			}
			else{
				$new_data = $_POST['name'];
				$old_data = $_POST['select'];
				$sql = "UPDATE $choix SET name = '$new_data' WHERE name = '$old_data'";
				$result = mysqli_query($conn,$sql) or die (mysqli_error($conn));
				?><p class="correct">Successful modification</p><?php
			}
		}
		?>

		<div class="select">
			<select name="select" form="modify_other">
				<?php
				$sql = "SELECT * from $choix";
	            $req = mysqli_query($conn,$sql); 
	            while($row = mysqli_fetch_array($req)){		
	        	   echo '<option value="'.$row[1].'">'.$row[1].'</option>';	      // on affiche chaque champ
	            }
	            mysqli_free_result ($req); 
	            ?>
			</select>
		</div>

		<form method="post" action="modify_other.php" id="modify_other">
			<input type="text" name="name">
			<input type="submit" name="ok" value="Modify">

			<input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix dans $_POST (brand,color,size ou category) -->
		</form>
		<a href="../index.php">Retour</a>

	</html>