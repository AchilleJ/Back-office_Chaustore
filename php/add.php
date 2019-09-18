<?php  


$conn = mysqli_connect('localhost', 'chaustore', 'ZlpÄÐ:;6F{n7O{pV'); //se connecter à son compte mysql ("localhost","utilisateur_sql","mot de passe")
mysqli_select_db($conn,'simplon_chaustore'); //selectionner une database
mysqli_set_charset($conn,'utf8');


$name = $_POST['color'];

$sql = "INSERT INTO color (name) values ('$name');"; 

$result = mysqli_query($conn, $sql);

var_dump($result);

/*
while ($row = mysqli_fetch_array($result)) {
	echo($row[0]." ". $row[1]."<br>");
}
/*