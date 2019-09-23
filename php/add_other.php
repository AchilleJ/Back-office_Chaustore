<?php  
require_once('connectDB.php');

if (!empty($_POST['name'])) {
	$data = $_POST['name'];
	$sql = "INSERT INTO color (name) values ('$data');"; 
	$result = mysqli_query($conn,$sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysqli_error($conn));
 
	var_dump($result);
	unset($_POST);
}
