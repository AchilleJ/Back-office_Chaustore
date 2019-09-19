<?php  
require_once('connectDB.php');

$data = $_POST['name'];
$sql = "INSERT INTO color (name) values ('$data');"; 
$result = mysqli_query($conn,$sql) or die('Erreur SQL !<br />'.$sql.'<br/>'.mysqli_error($conn));

var_dump($result);

