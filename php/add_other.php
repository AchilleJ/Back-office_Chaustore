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
		<h2>Write a <?php echo $choix ?> and click on "add":</h2>
		<form method="post" action="add_other.php" id="add_other">
			<input type="text" name="name">
			<input type="submit" name="ok" value="Add">

			<input type="hidden" name="choix" value="<?php echo $choix;?>">  <!-- garder en memoire le choix (brand,color,size ou category) -->
		</form>

		<a href="../index.php">Retour</a>

	<?php
	$error= "";
	if (isset($_POST['name'])) {		//name n'existe pas lorsqu' on lance la page donc on rentre dans la condition seulement si on submit(cela créer name)

		if (empty($_POST['name']) || $_POST['name'] ==" ") {										
			$error = "vide";
			?><p class="error">Error, write something please<</p><?php
		}
		else{
			$data = $_POST['name'];
			$sql = "INSERT INTO $choix (name) values ('$data');"; 
			$result = mysqli_query($conn,$sql) or die('<p class="error">Error,'.' '.'"'.$data.'"'.' '.'already exist</p>');  // un seul test:doublon
			?><p class="correct">Successful addition</p><?php
		}
	}
	?>
</body>
</html>

