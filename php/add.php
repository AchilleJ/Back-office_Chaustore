<?php  


$conn = mysqli_connect('localhost', 'chaustore', 'ZlpÄÐ:;6F{n7O{pV'); //se connecter à son compte mysql ("localhost","utilisateur_sql","mot de passe")
mysqli_select_db($conn,'simplon_chaustore'); //selectionner une database
mysqli_set_charset($conn,'utf8');

	$data = $_POST[''];
	$sql = "INSERT INTO color (name) values ('$data');"; 
	$result = mysqli_query($conn, $sql);

	var_dump($result);

